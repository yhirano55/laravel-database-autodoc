<?php

namespace Laravel\DatabaseAutodoc\Listeners;

use Illuminate\Support\Facades\Artisan;

class CommandFinishListener
{
    private const TARGET_MIGRATE_COMMANDS = [
        'migrate',
        'migrate:fresh',
        'migrate:refresh',
        'migrate:reset',
        'migrate:rollback',
    ];

    public function handle($event): void
    {
        if (in_array($event->command, self::TARGET_MIGRATE_COMMANDS)) {
            Artisan::call('db:doc');
        }
    }
}
