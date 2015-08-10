<?php

function __autoload($class){
	$class = "class/$class.class.php";
	include file_exists($class)? $class: "../$class";
}

function escape($var){
	return Banco::$conn->real_escape_string($var);
}