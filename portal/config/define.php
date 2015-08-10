<?php

switch($_SERVER['SERVER_NAME']){

    case 'localhost':
        define('HOST_NAME', 'localhost');
        define('HOST_USER', 'root');
        define('HOST_SENHA', '');
        define('HOST_DB', 'redesocial');
    break;

    default :
        define("HOST_NAME", "localhost");
        define("HOST_USER", "tadeu572_rede");
        define("HOST_SENHA", "4cd102a3");
        define("HOST_DB", "tadeu572_portal");
        break;

}