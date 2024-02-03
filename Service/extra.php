<?php 

function charger($class){
    $fileModel = "Model/$class.php";
    $fileController = "Controller/$class.php";
    $fileService = "Service/$class.php";
    $files = [$fileModel, $fileController, $fileService];
    
    foreach ($files as $file) {
        if (file_exists($file)) {
            include($file);
        } 
        }
    }

