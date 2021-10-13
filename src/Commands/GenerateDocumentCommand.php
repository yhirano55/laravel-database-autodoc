<?php

namespace Laravel\DatabaseAutodoc\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\DB;

class GenerateDocumentCommand extends Command
{
    /**
     * The filesystem instance.
     *
     * @var \Illuminate\Filesystem\Filesystem
     */
    protected $files;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:doc';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the database document';

    /**
     * Create a new command instance.
     *
     * @param \Illuminate\Filesystem\Filesystem $files
     * @return void
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct();

        $this->files = $files;
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $path = $this->getPath();
        $this->files->put($path, $this->getContent());
        $this->info($path . ' generated successfully.');
    }

    /**
     * Get the destination document path.
     *
     * @return string
     */
    private function getPath(): string
    {
        return $this->laravel->databasePath() . '/README.md';
    }

    /**
     * Get the file content
     *
     * @return string
     */
    private function getContent(): string
    {
        return "# Database Schema\n\n" . $this->getTables();
    }

    /**
     * Get table information from database
     *
     * @return string
     */
    private function getTables(): string
    {
        $tables = '';

        $databaseName = env('DB_DATABASE');
 
        $query = 'SELECT table_name as name, table_comment as description FROM information_schema.tables WHERE table_schema = "' . $databaseName . '"';

        collect(DB::select($query))->each(function ($t) use (&$tables) {
            $columns = collect(DB::select("SHOW FULL COLUMNS FROM {$t->name}"));

            $tables .= "## {$t->name}\n\n";
            if (!empty($t->description)) {
                $tables .= "{$t->description}\n\n";
            }
            $tables .= "| Field | Type | Null | Key | Default | Extra | Comment |\n";
            $tables .= "|:------|:-----|:-----|:----|:--------|:------|:--------|\n";

            $columns->each(function ($column) use (&$tables) {
                $tables .= "| {$column->Field} | {$column->Type} | {$column->Null} | {$column->Key} | {$column->Default} | {$column->Extra} | {$column->Comment} |\n";
            });

            $tables .= "\n";
        });

        return $tables;
    }
}
