<?php

class Conecta{

	public static $con;
	public static $sel;
	public static $login;

	public static function start(){
		if(!self::$con){
			self::$con = new mysqli('localhost','root','','agenda') or die( mysqli_error() );
		}
		return self::$con;
	}

	public static function cadastro($login,$senha){
		$sql = self::$con->query("SELECT id FROM usuarios WHERE login='{$login}'");
		if(!$sql->num_rows){
			$sql = self::$con->query("INSERT INTO usuarios (login,senha) VALUES ('$login','$senha')");
			if($sql){
				$_SESSION['login'] = $login;
				echo "cadastrado";
			}
		} else {
			echo 'existe';
		}
	}

	public static function login($login,$senha){
		$sql = self::$con->query("SELECT * FROM usuarios WHERE login='{$login}'");

		if($sql->num_rows){
			$row = mysqli_fetch_object($sql);
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
		$sql = self::$con->query("SELECT * FROM usuarios WHERE login='{$login}'");

		if($sql->num_rows){
			$_SESSION['login'] = $login;

			$agenda = self::$con->query("SELECT * FROM agenda WHERE user='{$login}'");

			if($sql->num_rows){
				return mysqli_fetch_object($agenda);
			}
		} else {
			unset($_SESSION['login']);
		}
	}

	public static function postar($valor){
		$valor = self::$con->real_escape_string($valor);

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

		$sql = self::$con->query("INSERT INTO agenda (user,conteudo,data,time) VALUES ('{$login}', '{$valor}', '{$date}', '{$time}')");

		echo json_encode( array('data'=>$date, 'id'=>$time) );
	}

	public static function get($tab,$campo=''){
		$sql = self::$con->query("SELECT * FROM {$tab} WHERE $campo");
		return mysqli_fetch_object($sql);
	}

	public static function remover($id){
		$sql = self::$con->query("DELETE FROM agenda WHERE time='{$id}'");
		return mysqli_error($sql);
	}

}