<?php

include "define.php";

function __autoload($classes){
    
    $file = sprintf("class/%s.class.php", $classes);
    
    if(file_exists($file)){
        require_once $file;
    }
    
    $file = "../$file";
    
    if(file_exists($file)){
        require_once $file;
    }
    
}

Conecta::conect();