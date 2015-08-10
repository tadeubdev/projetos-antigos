<?php

function __autoload($class){
	$class = "class/$class.class.php";
	include (file_exists($class)? $class: "../$class");
}

function geek($e, $var){
    $alf = "abcdefghijklmnopqrstuvxwyz-_@";
    return md5(strpos($alf, substr($e,0,1)) . strpos($alf, substr($e,1,1)) . $var);
}