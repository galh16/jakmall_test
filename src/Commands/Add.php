<?php

require_once 'src/Calculate/Calculate.php';

use Illuminate\Console\Command;

class Add extends Command
{
    protected $signature = 'add {numbers*}';

    protected $description = 'Add all given numbers';

    public function __construct()
    {
        parent::__construct();
    }
    
    public function handle()
    {
        $getParam = $this->argument('numbers');
        
        $result = Calculate::run($getParam, '+');
        echo $result[1];
    }
}