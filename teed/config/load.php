<?php

session_start(); $_SESSION['itsmemario'] = 1;

require_once 'define.php';

function __autoload($classes){
    
    if(file_exists(sprintf("class/%s.class.php", $classes))){
        require_once sprintf("class/%s.class.php", $classes);
    }
    
    if(file_exists(sprintf("../class/%s.class.php", $classes))){
        require_once sprintf("../class/%s.class.php", $classes);
    }
    
    if(file_exists(sprintf("%s.class.php", $classes))){
        require_once sprintf("%s.class.php", $classes);
    }
    
}

Carrinho::start();

require_once 'partes/header.php';
