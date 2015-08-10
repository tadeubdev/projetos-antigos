<?php
	$nome = $_POST['nome'];
	$sobrenome = $_POST['sobrenome'];
	$login = $_POST['login'];
	$email = $_POST['email'];
	$senha = $_POST['senha'];
	$senha2 = $_POST['senha2'];
	
	$palavra = '/( )/';
	
	if(empty($nome)){
		$erro = 'Insira um Nome !';
	} else if(empty($sobrenome)){
		$erro = 'Insira um Sobrenome !';
	} else if(empty($login)){
		$erro = 'Insira um Login !';
	} else if (preg_match($palavra, $login)) {
		$erro = "O Login nao pode conter espaços !";
	} else if(empty($email)){
		$erro = 'Insira um Email !';
	} else if(empty($senha)){
		$erro = 'Insira uma Senha !';
	} else if(empty($senha2)){
		$erro = 'Repita a Senha !';
	} else if($senha!=$senha2){
		$erro = 'As senhas devem ser iguais !';
	} else {
	
	include'conecta.php';

	$result_u = mysql_query("SELECT * FROM user WHERE login='{$login}'");
	
	while($row = mysql_fetch_array($result_u)){
		$login_v = $row['login'];			
		if(!empty($login_v)){
		$erro = 'Ja existe um usuario com este Login !';
		} else {
		$erro = 'Login Valido !';	
		}	
		
	}
	
	
		
	}
	
if(!empty($erro)){
	echo '<br><div class="resultado_mostra">'.$erro.'</div>';
} else {
	
	$senha = base64_encode($senha);
	
	$adm=0;
	$ver_adm = mysql_query("SELECT * FROM user");
	$num_rows = mysql_num_rows($ver_adm);
	if($num_rows<1){$adm=1;}
	
	
	$cad = "INSERT INTO user (login, adm, nome, sobrenome, email, senha) VALUES
	('$login','$adm','$nome','$sobrenome','$email', '$senha')
	";
	
	include'conecta.php';
	mysql_query($cad);	
	
	session_start();
	$_SESSION['login'] = $login;	
	$_SESSION['continua'] = 'sim';
	
		
	
	echo '<script language= "JavaScript">
		location.href="editar.php"
	</script>';	
	
}


?>