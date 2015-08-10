<?php

extract($_POST);

switch($action){
	////////////
	case 'login':
		// $email;
		setcookie('uid',$email,time()+(31*24*3600),'/');
		echo 'efetuado';
		break;
	////////////
}