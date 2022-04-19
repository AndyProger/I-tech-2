<?php

function connect(){
    require_once __DIR__ . "/vendor/autoload.php";
    
    try {
        return new MongoDB\Client("mongodb://127.0.0.1:27017");
    }
    catch(PDOException $ex) {
        echo $ex->GetMessage();
    }
}
        
    
