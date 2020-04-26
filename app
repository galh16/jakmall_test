#!/usr/bin/env php
<?php
date_default_timezone_set('Asia/Jakarta');

use Illuminate\Console\Application;
use Illuminate\Container\Container;
use Illuminate\Events\Dispatcher;
use Symfony\Component\Console\Input\ArgvInput;
use Symfony\Component\Console\Output\ConsoleOutput;

try {
    require_once __DIR__.'/vendor/autoload.php';

    $DB_HOST="localhost";
    $DB_USER="root";
    $DB_PASS="";
    $DB_NAME="test_jakmall";
    
    $FILE_NAME="test_jakmall.txt";
    
    $container = new Container();
    $dispatcher = new Dispatcher();
    $app = new Application($container, $dispatcher, '0.1');
    $app->setName('Calculator');
    
    $providers = [
        \Jakmall\Recruitment\Calculator\History\CommandHistoryServiceProvider::class,
    ];

    foreach ($providers as $provider) {
        $container->make($provider)->register($container);
    }

    $container->when('CommandHistoryServiceProvider');
    
    $commands = require_once __DIR__.'/commands.php';
    $commands = collect($commands)
        ->map(
            function ($command) use ($app) {
                return $app->getLaravel()->make($command);
            }
        )
        ->all()
    ;

    $app->addCommands($commands);

    $app->run(new ArgvInput(), new ConsoleOutput());
} catch (Throwable $e) {
    echo "Unknown command, see help for propper used.\n";
}
