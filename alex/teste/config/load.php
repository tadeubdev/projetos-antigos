<?php

include 'conexao.php';

if(isset($_SERVER['HTTP_REFERER'])){
	$ref = explode('/', str_replace(array('http://','https://'),'', $_SERVER['HTTP_REFERER']));
	$ref = "http://{$ref[0]}";
}