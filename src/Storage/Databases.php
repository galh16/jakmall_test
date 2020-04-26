<?php

class Databases{
    
    private $host;
    private $user;
    private $password;
    private $dbName;
    
    public function __construct() {
        
        global $DB_HOST;
        global $DB_USER;
        global $DB_PASS;
        global $DB_NAME;
        
        $this->host=$DB_HOST;
        $this->user=$DB_USER;
        $this->password=$DB_PASS;
        $this->dbName=$DB_NAME;
    }
    
    public function InsertQuery($query){
        if($this->CheckingConnection()){
            $db = mysqli_connect($this->host, $this->user, $this->password, $this->dbName);
            mysqli_query($db, $query);
            
            mysqli_close($db);
            
            return true;
        } else {
            return false;
        }
    }
    
    public function SelectQuery($query){
        if($this->CheckingConnection()){
            $db = mysqli_connect($this->host, $this->user, $this->password, $this->dbName);
            $result = mysqli_query($db, $query);

            $historyLines="";
            $number=1;
            
            while ($row = mysql_fetch_assoc($result)) {
                $historyLines = $number." ".$row['History']." ".$row['DateAction']."\n";
                $number++;
            }
            
            mysqli_free_result($result);
            mysqli_close($db);
            
            return $historyLines;
        } else {
            return "";
        }
            
    }
    
    public function DeleteQuery($query){
        if($this->CheckingConnection()){
            $db = mysqli_connect($this->host, $this->user, $this->password, $this->dbName);
            mysqli_query($db, $query);
            mysqli_close($db);
            
            return true;
        } else {
            return false;
        }
    }
    
    private function CheckingConnection(){
        
        @$mysql = new mysqli($this->host, $this->user, $this->password, $this->dbName);
        if($mysql->connect_errno){
            return false;
        }
        
        return true;
    }
}