<?php
	
include "define.php";

function __autoload($class) {
	$class = "class/$class.class.php";
	include (file_exists($class)? $class: "../$class");
}

Banco::conexao();