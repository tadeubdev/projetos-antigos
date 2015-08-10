<?php

switch( $_SERVER['SERVER_NAME'] ){
	case 'localhost':
		define('HOST_NAME', 'localhost');
		define('HOST_USER', 'root');
		define('HOST_PASS', '');
		define('HOST_DB', 'palavraeoracao');

		define('URL', sprintf("http://%s%s", $_SERVER['SERVER_NAME'],$_SERVER['REQUEST_URI']));
		$dominio = explode('/', str_ireplace(array('http://','http://'),'',URL) );
		define('DOMINIO', $dominio[1]);
		define('PASTA', $dominio[2]);
		define('ARQ', $dominio[3]);

		define('DATA',data());
		break;
	# default;
	default:
		break;
}


function data() {
	date_default_timezone_set("America/Sao_Paulo");
	$trans = (object) array();
	$trans->dia = array('Mon'=>'Segunda-Feira','Tue'=>'Terça-Feira','Wed'=>'Quarta-Feira','Thu'=>'Quinta-Feira','Fri'=>'Sexta-Feira','Sat'=>'Sábado','Sun'=>'Domingo');
	$trans->mes = array('01'=>'Janeiro','02'=>'Fevereiro','03'=>'Março','04'=>'Abril','05'=>'Maio','06'=>'Junho','07'=>'Julho','08'=>'Agosto','09'=>'Setembro','10'=>'Outubro','11'=>'Novembro','12'=>'Dezembro');
	return sprintf('%s | %s, dia %s de %s de %s',date('H:i'),strTr(date('D'),$trans->dia),date('d'),strTr(date('m'),$trans->mes),date('Y'));
}