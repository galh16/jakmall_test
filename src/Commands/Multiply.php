<?php

require_once 'src/Calculate/Calculate.php';

use Illuminate\Console\Command;

class Multiply extends Command
{
    
    protected $signature = 'multiply {numbers*}';

    protected $description = 'Multiply all given numbers';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $getParam = $this->argument('numbers');
        
        $result = Calculate::run($getParam, '*');
        echo $result[1];
    }
}