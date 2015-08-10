<style>
	input[type=submit]{width:300px;}
</style>

<?php
$page = 'Informa&ccedil;&otilde;es'; //Nome da pagina para aparecer no titulo
include'header.php'; //Inclui o cabeçalho
include'conecta.php';

if (!isset($_SESSION)){session_start();}
if(!empty($_SESSION['login']) && $adm>0){
	

if(!empty($_GET['oracao'])){
		$id_oracao = $_GET['oracao'];			
		$pega = mysql_query("SELECT * FROM oracao WHERE id='{$id_oracao}'");		
		$row = mysql_fetch_array($pega);
		$valor = $row['oracao'];
		?>
        <form action="" method="post">
	<textarea style=" height:300px;" name="valor" id="valor"><?php echo $valor;?></textarea>    
    <input type="submit" name="pronto" style="cursor:pointer; width:100px!important;" value="Pronto" id="pronto" value="Submit"></form>			
<?php	
	if(isset($_POST['pronto'])){	
		include'conecta.php';
		include'data.php';
		$data = '[Editado] ' . $data;
		$valor = $_POST['valor'];		
		mysql_query("UPDATE oracao SET oracao='{$valor}' WHERE id='{$id_oracao}'");
		mysql_query("UPDATE oracao SET data='{$data}' WHERE id='{$id_oracao}'");			
		echo '<script>	alert("Editado");history.go(-2);	</script>';	
		}



} else if(!empty($_GET['oracao_comentario'])){
		$id_oracao_comen = $_GET['oracao_comentario'];			
		$pega = mysql_query("SELECT * FROM oracao_comen WHERE id='{$id_oracao_comen}'");		
		$row = mysql_fetch_array($pega);
		$valor = $row['comentario'];?>
        <form action="" method="post">
	<textarea style=" height:300px;" name="valor" id="valor"><?php echo $valor;?></textarea>    
    <input type="submit" name="pronto" style="cursor:pointer; width:100px!important;" value="Pronto" id="pronto" value="Submit"></form>			
<?php	
	if(isset($_POST['pronto'])){	
		include'conecta.php';
		include'data.php';
		$data = '[Editado] ' . $data;
		$valor = $_POST['valor'];
		mysql_query("UPDATE oracao_comen SET comentario='{$valor}' WHERE id='{$id_oracao_comen}'");
		mysql_query("UPDATE oracao_comen SET data='{$data}' WHERE id='{$id_oracao}'");	
		echo '<script>	alert("Editado");history.go(-2);	</script>';	
		}
} else 




if(!empty($_GET['palavra'])){
		$id_palavra = $_GET['palavra'];			
		$pega = mysql_query("SELECT * FROM palavra WHERE id='{$id_palavra}'");		
		$row = mysql_fetch_array($pega);
		$valor = $row['palavra']; ?>
        <form action="" method="post">
	<textarea style=" height:300px;" name="valor" id="valor"><?php echo $valor;?></textarea>    
    <input type="submit" name="pronto" style="cursor:pointer; width:100px!important;" value="Pronto" id="pronto" value="Submit"></form>			
<?php	
	if(isset($_POST['pronto'])){	
		include'conecta.php';
		include'data.php';
		$data = '[Editado] ' . $data;
		$valor = $_POST['valor'];
		mysql_query("UPDATE palavra SET palavra='{$valor}' WHERE id='{$id_palavra}'");
		mysql_query("UPDATE palavra SET data='{$data}' WHERE id='{$id_palavra}'");		
		echo '<script>	alert("Editado");history.go(-2);	</script>';	
		}


} else if(!empty($_GET['palavra_comentario'])){
		$id_palavra_comen = $_GET['palavra_comentario'];			
		$pega = mysql_query("SELECT * FROM palavra_comen WHERE id='{$id_palavra_comen}'");		
		$row = mysql_fetch_array($pega);
		$valor = $row['comentario'];?>
        <form action="" method="post">
	<textarea style=" height:300px;" name="valor" id="valor"><?php echo $valor;?></textarea>    
    <input type="submit" name="pronto" style="cursor:pointer; width:100px!important;" value="Pronto" id="pronto" value="Submit"></form>			
<?php	
	if(isset($_POST['pronto'])){	
		include'conecta.php';
		include'data.php';
		$data = '[Editado] ' . $data;
		$valor = $_POST['valor'];
		mysql_query("UPDATE palavra_comen SET comentario='{$valor}' WHERE id='{$id_palavra_comen}'");
		mysql_query("UPDATE palavra_comen SET data='{$data}' WHERE id='{$id_palavra}'");	
		echo '<script>	alert("Editado");history.go(-2);	</script>';	
		}
}





	
} else {
	header("Location: index.php");	
}
?>