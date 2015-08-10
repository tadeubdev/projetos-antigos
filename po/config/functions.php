<?php

function __autoload($class) {
	$class = "class/$class.class.php";
	include file_exists($class)? $class: "../$class";
}

function escape($str) {
	return preg_replace('/([%_])/u', '\\\\$1', mysql_real_escape_string( preg_replace('/\\\\/u','\\\\\\\\',$str) ));
}
;
function sem_login()
{
	if(ARQ!='home.php')
	{
		header('Location: home.php');
	}
}

Banco::conexao();

if(isset($_COOKIE['lg'])) {
	$lg = escape($_COOKIE['lg']);
	$lg = Banco::query("SELECT * FROM user WHERE login='{$lg}'");

	if($lg->num_rows){
		$row = $lg->fetch_array();
		$user = (object) array();

		foreach($row as $i=>$u){ $user->$$i = ($i!='pass'||$i!='senha'? $u :''); }
	} else { sem_login(); }

} else { sem_login(); }


function online(){
	$online = (object) array();
	$online->min = 5;
	$online->ip = $_SERVER['REMOTE_ADDR'];
	$online->login = (isset($login)? $login :"Visitante");

	$online->sel = Banco::query("SELECT * FROM acessos_online WHERE ip='{$online->ip}' ");

	if($online->sel->num_rows) {
		Banco::query("UPDATE acessos_online SET time='".time()."' AND SET login='{$online->login}' WHERE ip='{$online->ip}'");
	} else {
		Banco::query("INSERT INTO acessos_online (ip,time,login) VALUES ('{$online->ip}','".time()."','{$online->login}'')");
	}

	Banco::query("DELETE FROM acessos_online WHERE time<". (time()-($online->min*60)));

	$online->verifica = Banco::query("SELECT * FROM acessos_online");
	$online->conta = $online->verifica->num_rows;

	return $online->conta;
}
define('ONLINE', online());