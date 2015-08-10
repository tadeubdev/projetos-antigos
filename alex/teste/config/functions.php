<?php

function __autoload( $class ){
	$class = "class/$class.class.php";
	include file_exists($class)? $class: "../$class";
}

function escape( $val ){
	return mysql_real_escape_string(mysql_real_escape_string(mysql_real_escape_string( $val )));
}