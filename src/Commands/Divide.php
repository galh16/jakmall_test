<?php

require_once 'src/Calculate/Calculate.php';
require_once 'src/Storage/Databases.php';
require_once 'src/Storage/Files.php';

use Illuminate\Console\Command;

class Divide extends Command
{
    
    protected $signature = 'divide {numbers*}';

    protected $description = 'Divide all given numbers';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $getParam = $this->argument('numbers');
        
        $result = Calculate::run($getParam, '/');
        echo $result[1];
        
        $db = new Databases();
        $db->InsertQuery("INSERT into history (Id, History, DateAction) VALUES (NULL, '".$result[1]."', '".date('Y-m-d H:i:s')."')");
        
        $files = new Files();
        $files->Write(preg_replace( "/\r|\n/", "", $result[1]." ".date('Y-m-d H:i:s')));
        
        return $result[1];
    }
}