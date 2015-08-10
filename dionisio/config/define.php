<?php

switch ($_SERVER['SERVER_NAME']) {
    
    case 'localhost':
        define("HOST_NAME", "localhost");
        define("HOST_USER", "root");
        define("HOST_SENHA", "");
        define("HOST_BD", "dinisio");
        break;
    
    default:
        
        break;
    
}

function geek($e, $var){
    $alf = "abcdefghijklmnopqrstuvxwyz-_@";
    return md5(strpos($alf, substr($e,0,1)) . strpos($alf, substr($e,1,1)) . $var);
}