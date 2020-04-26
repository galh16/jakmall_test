<?php

require_once 'src/Calculate/Calculate.php';

use Illuminate\Console\Command;

class Substract extends Command
{
    protected $signature = 'substract {numbers*}';

    protected $description = 'Substract all given numbers';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $getParam = $this->argument('numbers');
        
        $result = Calculate::run($getParam, '-');
        echo $result[1];
    }
}