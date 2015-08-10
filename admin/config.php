<?php

class Conecta{
	
	public static $con;
	public static $sel;
	public static $login;
	
	public static function start(){
		if(!self::$con){
			self::$con = mysql_connect('localhost','root','') or die( mysql_error() );
			
			mysql_select_db('admin', self::$con) or die( mysql_error() );
		}
		return self::$con;
	}
	
	public static function cadastro($login,$senha){
		$sql = mysql_query("SELECT id FROM usuarios WHERE login='{$login}'");
		$cont = mysql_num_rows($sql);
		
		if(!$cont){
			$sql = mysql_query("INSERT INTO usuarios (login,senha) VALUES ('$login','$senha')");
			if($sql){
				$_SESSION['login'] = $login;
				echo "cadastrado";
			}
		} else {
			echo 'existe';
		}
	}
	
	public static function login($login,$senha){
		$sql = mysql_query("SELECT * FROM usuarios WHERE login='{$login}'");
		$cont = mysql_num_rows($sql);
		
		if($cont){
			$row = mysql_fetch_object($sql);
			if($row->senha==$senha){
				$_SESSION['login'] = $login;
				echo 'logado';
			} else {
				echo 'senha';
			}
		} else {
			echo 'nao';
		}
	}
	
	public static function perfil($login){
		$sql = mysql_query("SELECT * FROM usuarios WHERE login='{$login}'");
		$cont = mysql_num_rows($sql);
		
		if($cont){
			$_SESSION['login'] = $login;
			
			$agenda = mysql_query("SELECT * FROM agenda WHERE user='{$login}'");
			$cont = mysql_num_rows($agenda);
			
			if($cont){
				return mysql_fetch_object($agenda);
			}
		} else {
			unset($_SESSION['login']);
		}
	}
	
	public static function postar($valor){
		$valor = mysql_real_escape_string($valor);
			
		$dia = (object)array();
		
		date_default_timezone_set('America/Sao_Paulo');
		
		$time = time();
		
		$semana = date('w');
		
		$min = date('i');
		
		$horas = date('G');
		
		$dia = date('d');
		
		$mes = date('n');
		
		$ano = date('Y');
		
		switch($semana){
			case 0:
				$semana = "Domingo";
				break;
			//////////
			case 1:
				$semana = "Segunda-Feira";
				break;
			//////////
			case 2:
				$semana = "Ter&ccedil;-Feira";
				break;
			//////////
			case 3:
				$semana = "Quarta-Feira";
				break;
			//////////
			case 4:
				$semana = "Quinta-Feira";
				break;
			//////////
			case 5:
				$semana = "Sexta-Feira";
				break;
			//////////
			case 6:
				$semana = "S&aacute;bado";
				break;
			//////////
		}
		
		switch($mes){
			case 1:
				$mes = "Janeiro";
				break;
			//////////
			case 2:
				$mes = "Fevereiro";
				break;
			//////////
			case 3:
				$mes = "Mar&ccedil;o";
				break;
			//////////
			case 4:
				$mes = "Abril";
				break;
			//////////
			case 5:
				$mes = "Maio";
				break;
			//////////
			case 6:
				$mes = "Junho";
				break;
			//////////
			case 7:
				$mes = "Julho";
				break;
			//////////
			case 8:
				$mes = "Agosto";
				break;
			//////////
			case 9:
				$mes = "Setembro";
				break;
			//////////
			case 10:
				$mes = "Outubro";
				break;
			//////////
			case 11:
				$mes = "Novembro";
				break;
			//////////
			case 12:
				$mes = "Dezembro";
				break;
			//////////
		}
		
		$date = "$semana,  $dia de $mes de $ano | $horas:$min";
		
		$login = $_SESSION['login'];
		
		$sql = mysql_query("INSERT INTO agenda (user,conteudo,data,time) VALUES ('{$login}', '{$valor}', '{$date}', '{$time}')") or die( mysql_error() );
		
		echo json_encode( array('data'=>$date, 'id'=>$time) );
	}
	
	public static function get($tab,$campo=''){
		$sql = mysql_query("SELECT * FROM {$tab} WHERE $campo");
		return mysql_fetch_object($sql);
	}
	
	public static function remover($id){
		$sql = mysql_query("DELETE FROM agenda WHERE time='{$id}'");
		return mysql_error($sql);
	}
	
}