<?php

session_start();

extract($_POST);

include('config.php');

Conecta::start();

switch($action){
	////////////
	case 'login':
		return Conecta::login($login, $senha);
		break;
	////////////
	case 'logout':
		unset($_SESSION['login']);
		break;
	////////////
	case 'cadastro':
		return Conecta::cadastro($login, $senha);
		break;
	////////////
	case 'postar':
		return Conecta::postar($valor);
		break;
	////////////
	case 'remover':
		return Conecta::remover($id);
		break;
	////////////
}