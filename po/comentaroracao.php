<?php

$valor = $_POST['valor'];

if(!empty($valor)){

if(!empty($valor)){

include'conecta.php';

$comentario = $_POST['valor'];
$id_login = $_POST['id'];
$id_oracao = $_POST['id_oracao'];


include'data.php';

$sql = "INSERT INTO oracao_comen (comentario, login, data, id_oracao) VALUES ('$comentario', '$id_login', '$data', '$id_oracao');";

$posta=mysql_query($sql);

$sql_comen = mysql_query("SELECT * FROM oracao_comen WHERE id_oracao='$id_oracao' ORDER BY id DESC ");

		$row_comen = mysql_fetch_array($sql_comen);
		$id_comen = $row_comen['id'];
		$comentario = $row_comen['comentario'];	
		
		$valor_substitui = $comentario;
			include'emoticon.php';
		$comentario = $valor_substitui;
				
		$palavra = $comentario;
		include'substitui.php';
		$comentario = $palavra;
		
		$id_login = $row_comen['login'];
		
		$data = $row_comen['data'];
		$id_oracao = $row_comen['id_oracao'];	
		$img_u = '';		
		
	$sql_u = mysql_query("SELECT * FROM user WHERE id='$id_login'");
	while($row_u = mysql_fetch_array($sql_u)){
		$id_u = $row_u['id'];
		$nome_u = $row_u['nome'];
		$sobrenome_u = $row_u['sobrenome'];
		$login_u = $row_u['login'];
		$nome_u = $row_u['nome'];	
		
		if(!empty($row_u['img'])){$img_u = $row_u['img']; 
			$subs = array('img/' => 'img/small/');
			$img_u = strTr($img_u, $subs);
		} else {$img_u = 'img/small/user.png';}
	}
	
	if(!empty($_SESSION['login']) && $adm>0){$apaga = '<a href="apagar.php?oracao_comentario='.$id_comen.'" style="float:right;"> <img src="img/x.png" style="width:10px;"> </a>';	} else {$apaga='';}
	
	echo "<div class='mostra'>
	
	<div style='float:left;'> <a href='user.php?user={$id_u}' title='{$nome_u}' target='_blank'><img src='$img_u' class='user' /></a>	</div>	
	<div style='float:left; width:80%;'>	$comentario</div>		$apaga
	<div class='clear'></div>			
	<div style='border-top:1px #CCC dashed; width:100%; margin-top:7px; padding-bottom:2px; padding-top:2px; font-size:10px;'>	by <a href='user.php?user={$id_u}' title='{$nome_u}' target='_blank'>$login_u</a>  -  $data	- <span style='float:right;'>#$id_comen</span>	
	</div>
	
	<div class='clear'></div>
		</div>
	";



}
}
?>