<?php
include'config/conexao.php';

if(empty($_POST['login'])){

	echo '<span class="resultado_mostra">Digite um Login !</span>';

} else if(empty($_POST['senha'])){

	echo '<span class="resultado_mostra">Digite uma Senha !</span>';

} else {

	$login = $_POST['login'];
	$senha = $_POST['senha'];

	$conecta = Banco::query("SELECT * FROM user WHERE login='{$login}'");
	$num_rows = $conecta->num_rows;

	while($row_v = $conecta->fetch_array()){
		$senha2 = $row_v['senha'];
	}

	if(empty($num_rows)){

		echo '<span class="resultado_mostra">Usuario n&atilde;o Existe !</span>';

	} else if($senha!=base64_decode($senha2)){

		echo '<span class="resultado_mostra">Senha Incorreta !</span>';

	} else {

		session_start();
		$_SESSION['login'] = $login;

		echo 'Login Efetuado !';

		echo '<script language= "JavaScript">
		location.href="perfil.php"
		</script>';
	}
}


?>