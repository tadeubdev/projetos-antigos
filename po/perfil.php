<?php
include'config/load.php';

if(!empty($_SESSION['login'])){

	$result_user = Banco::query("SELECT * FROM user WHERE login='{$login}'");

	while($row = $result_user->fetch_array())
	  {
		$id = $row['id'];
		$nome = $row['nome'];
		$sobrenome = $row['sobrenome'];
	  }

	header("Location: user.php?user={$id}");

}


?>