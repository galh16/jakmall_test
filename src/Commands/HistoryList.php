<?php

require_once 'src/Calculate/Calculate.php';
require_once 'src/Storage/Databases.php';
require_once 'src/Storage/Files.php';

use Illuminate\Console\Command;

class HistoryList extends Command
{
    protected $signature = 'history:list {--driver=}';

    protected $description = 'Show calculator history';

    public function __construct()
    {
        parent::__construct();
    }
    
    public function handle()
    {
        $getDriver = $this->options('driver');
        $getHistory="";
        
        if (strtoupper($getDriver['driver'])=="DATABSE"){
            $db = new Databases();
            $getHistory = $db->SelectQuery("SELECT * FROM history");
        } else {
            $files = new Files();
            $getHistory = $files->Read();
        }
        
        echo $getHistory;
    }
}