<?php

switch( $_SERVER['SERVER_NAME'] ){
    
    case 'localhost':
        define('HOST_NAME', 'localhost');
        define('HOST_USER', 'root');
        define('HOST_PASS', '');
        define('HOST_DB', 'pixel');
    break;
    
    default:
        define("HOST_NAME", "localhost");
        define("HOST_USER", "tadeu572_rede");
        define("HOST_PASS", "4cd102a3");
        define("HOST_DB", "tadeu572_bd");
    break;
    
}

function geek($e, $var){
    $alf = "abcdefghijklmnopqrstuvxwyz-_@";
    return md5(strpos($alf, substr($e,0,1)) . strpos($alf, substr($e,1,1)) . $var);
}