# laravel-database-autodoc

## Introduction

Generate a markdown file which describes all tables schema information after migrate command.
It helps you easily check your laravel app database structure.

## Installation

    $ composer require --dev yhirano55/laravel-database-autodoc

## Usage

After installation this package, you become able to execute `db:doc` artisan command.
The `db:doc` command is to generate **a markdown file (database/README.md) which describes all tables schema information** like [this example](EXAMPLE.md).
Its command automatically executes after your migrate command.

So you don't need to do anything other than installation.

## License

laravel-database-autodoc is open-sourced licensed under the [MIT license](LICENSE.md).
