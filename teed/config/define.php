<?php

switch ($_SERVER['SERVER_NAME']){
    case 'localhost':
        define("HOST_NAME", "localhost");
        define("HOST_USER", "root");
        define("HOST_PASS", "teed");
        define("HOST_BD", "redesocial");
        break;
    
    default:
        # default;
        break;
}