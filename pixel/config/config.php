<?php

include 'define.php';

function __autoload( $class ){

    $file = "class/$class.class.php";

    $fileTwo = "../class/$class.class.php";

    if(file_exists($file)){ require_once $file; }

    if(file_exists($fileTwo)){ require_once $fileTwo; }

}

Banco::start();

?>
