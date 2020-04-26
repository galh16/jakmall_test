<?php
class Files{
    private $filename;
    
    public function __construct() {
        global $FILE_NAME;
        
        $this->filename = $FILE_NAME;
    }
    
    public function Write($text){
        $getLines = $this->ReadFiles();
        
        if(!empty($getLines)){
            $fWrite = fopen($this->filename,"a");
            $number=1;
            
            for($i=0; $i<count($getLines); $i++){
                $number++;
            }
            
            $wrote = fwrite($fWrite, "\n".($number-1)." ".$text);
            
            fclose($fWrite);
        }
        
        return 1;
    }
    
    public function Clear(){
        $fWrite = fopen($this->filename,"w");
        $wrote = fwrite($fWrite, "");
        fclose($fWrite);
        
        return 1;
    }
    
    public function Read(){
        $getLines = $this->ReadFiles();
        $lineItem="";
        if(!empty($getLines)){
            for($i=0; $i<count($getLines); $i++){
                $lineItem = $getLines[$i]."\n";
            }
        }
        
        return $lineItem;
    }
    
    private function ReadFiles(){
        $allLines=null;
        $i=0;
        $file_handle = fopen($this->filename, "r");
        while (!feof($file_handle)) {
           $line = fgets($file_handle);
           $allLines[$i] =  $line;
           $i++;
        }
        fclose($file_handle);
        
        if(empty($allLines)){
            return [];
        } else {
            return $allLines;
        }
    }
}