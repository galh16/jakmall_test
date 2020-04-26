<?php

require_once 'src/Calculate/Calculate.php';
require_once 'src/Storage/Databases.php';
require_once 'src/Storage/Files.php';

use Illuminate\Console\Command;

class HistoryClear extends Command
{
    protected $signature = 'history:clear';

    protected $description = 'Clear saved history';

    public function __construct()
    {
        parent::__construct();
    }
    
    public function handle()
    {
        $db = new Databases();
        $db->DeleteQuery("DELETE FROM history");
        
        $files = new Files();
        $files->Clear();
        
        echo "History cleared!";
        
        return true;
    }
}