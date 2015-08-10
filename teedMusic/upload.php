<?php

$erro = null;

if (isset($_FILES['arquivo'])){

	include 'config/conexao.php';

    $extensoes = array(".mp3",".wma",".ogg",".3gpp");

    $nome = $_FILES['arquivo']['name'];
    $artista = $_POST['artista'];
    $album = $_POST['album'];
    $temp = $_FILES['arquivo']['tmp_name'];
    $ext = strtolower(strrchr($nome, "."));

    if(!in_array($ext, $extensoes)) {
        $erro = 'Extensao invalida';
    }

    if(empty($artista)){
        $erro = 'Insira um artista...';
    }

    switch ($_FILES['arquivo']['error']) { 
		case UPLOAD_ERR_INI_SIZE: 
			$erro = "Arquivo muito grande..."; 
			break; 
		case UPLOAD_ERR_FORM_SIZE: 
			$erro = "Arquivo muito grande..."; 
			break; 
		case UPLOAD_ERR_PARTIAL: 
			$erro = "Upload corrompido..."; 
			break; 
		case UPLOAD_ERR_NO_FILE: 
			$erro = "Nenhum arquivo foi enviado..."; 
			break; 
		case UPLOAD_ERR_NO_TMP_DIR: 
			$erro = "Erro na pasta temporaria..."; 
			break; 
		case UPLOAD_ERR_CANT_WRITE: 
			$erro = "Falaha ao escrever no disco..."; 
			break; 
		case UPLOAD_ERR_EXTENSION: 
			$erro = "Upload cancelado pela extensão..."; 
			break;
	}

    if(empty($erro)) {
        $nomeAleatorio = md5(uniqid(time())) . $ext;
    	$caminho = "m-s/{$nomeAleatorio}";

        if(!move_uploaded_file($temp, $caminho)){
            $erro = "Nao foi possivel anexar o arquivo $nomeAleatorio";
        } else {
        	$titulo = escape(str_ireplace($ext,'',$nome));
        	$key = md5(uniqid(time()));
        	$sql = Banco::query("INSERT INTO `musicas` (`titulo`,`artista`,`album`,`key`,`link`) VALUES ('{$titulo}','{$artista}','{$album}','{$key}','{$nomeAleatorio}')");
        	
        	$erro = "nenhum";

        	echo "<script>alert('Música Inserida no banco de dados...');</script>";
        }
    } else {
    	echo "<script>alert('$erro');</script>";
    }
}
?>
<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>teedMusic</title>
	<link rel="icon" href="img/icon.jpg">
	<link rel="stylesheet" href="css/estrutura.css">
	<script src="js/jquery-1.8.3.min.js"></script>
	<script src="audio/audio.min.js"></script>
	<script>
	$(function(){
		audiojs.events.ready(function() {
			var as = audiojs.createAll();
		});
	});
	</script>
	<style>
	#home{padding-top:0}
	#home-menu{margin-bottom:100px;}
	#home-input{height:auto;}
	#home-input input{height:40px;border-bottom:1px solid #CCC;border-radius:0;}
	#home-input input:first-child{border-radius: 7px 7px 0 0;}
	#home-input input[type="file"]{font-size:14px;padding:10px;}
	#home-input button{width:100%;height:50px;border:0;font-size:20px;color:#777;cursor:pointer;}
	</style>
</head>
<body>

	<div action="busca.php" class="clear box-sizing" id="home">
		<div id="home-menu">
			<a href="./">Home</a>
			<a href="upload.php">Upload</a>
		</div>

		<div id="home-logo"></div>

		<div id="home-input" class="box-sizing">
			<form action="" id="upload" method="post" enctype="multipart/form-data">
				<input class="box-sizing" type="file" name="arquivo" id="arquivo" />
				<input class="box-sizing" type="text" name="artista" placeholder="Artista"/>
				<input class="box-sizing" type="text" name="album" placeholder="Album"/>
				<button>Enviar</button>
			</form>
		</div>
	
		<?php
			if($erro=='nenhum'){
				echo "<center> <audio src=\"{$caminho}\"/> </center>";
			}
		?>

	</div>

</body>
</html>