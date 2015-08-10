<?php
	$page = 'Home'; //Nome da pagina para aparecer no titulo
	include'header.php'; //Inclui o cabeçalho
	include'conecta.php';
	
	include'verifica.php';

if($adm>=1){
	
	if(!empty($_GET['palavra'])){
		$palavra = $_GET['palavra'];		
		mysql_query("DELETE FROM palavra WHERE id='{$palavra}'");
		mysql_query("DELETE FROM palavra_comen WHERE id_palavra='{$palavra}'");
		echo '<script>	alert("Apagado");location.href="palavra.php";	</script>';	
	}	
	
	if(!empty($_GET['palavra_comentario'])){
		$palavra_comentario = $_GET['palavra_comentario'];		
		mysql_query("DELETE FROM palavra_comen WHERE id='{$palavra_comentario}'");
		echo '<script>	alert("Apagado");history.go(-2);	</script>';	
	}	
	
	
	
	if(!empty($_GET['oracao'])){
		$oracao = $_GET['oracao'];		
		mysql_query("DELETE FROM oracao WHERE id='{$oracao}'");
		mysql_query("DELETE FROM oracao_comen WHERE id_oracao='{$oracao}'");
		echo '<script>	alert("Apagado");location.href="oracao.php";</script>';	
	}	
	
	if(!empty($_GET['oracao_comentario'])){
		$oracao_comentario = $_GET['oracao_comentario'];
		mysql_query("DELETE FROM oracao_comen WHERE id='{$oracao_comentario}'");
		echo '<script>
					alert("Apagado");
					history.back(-2);
			</script>';	
	}	
	
	
	if(!empty($_GET['user'])){
		$user = $_GET['user'];		
		mysql_query("DELETE FROM user WHERE id='{$user}'");
		
		mysql_query("DELETE FROM oracao WHERE id_autor='{$user}'");
		mysql_query("DELETE FROM palavra WHERE id_autor='{$user}'");
		
		mysql_query("DELETE FROM oracao_comen WHERE id_autor='{$user}'");
		mysql_query("DELETE FROM palavra_comen WHERE id_autor='{$user}'");
		
		echo '<script>	alert("Apagado");history.go(-2);	</script>';
	}	
	
} else {
	header("Location: index.php");
}
?>