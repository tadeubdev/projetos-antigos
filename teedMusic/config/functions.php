<?php

function __autoload($class){
	$class = "class/$class.class.php";
	include file_exists($class)? $class: "../$class";
}

function escape($var){
	return Banco::$conn->real_escape_string($var);
}

function tratar( $url ) {
    $url = preg_replace('~[^\\pL0-9_]+~u', '-', $url);
    $url = trim($url, "-");
    $url = iconv("utf-8", "us-ascii//TRANSLIT", $url);
    $url = strtolower($url);
    $url = preg_replace('~[^-a-z0-9_]+~', '', $url);
    return $url;
}