<?php
	include 'config/conexao.php';

	$key = trim( escape($_GET['key']) );

	if(empty($key)){header("Location: index.php");}

	$seleciona = Banco::query("SELECT * FROM musicas WHERE 
		titulo LIKE '%{$key}%' OR artista LIKE '%{$key}%' OR album LIKE '%{$key}%'");
?>
<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>teedMusic</title>
	<link rel="icon" href="img/icon.jpg">
	<link rel="stylesheet" href="css/estrutura.css">
	<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
	<script src="audio/audio.min.js"></script>
	<script>
	$(function(){

		$('.ouvir').click(function(){
			var $pai = $(this).parent(),
				embed = $('<audio src="'+$pai.attr('mus')+'" preload="autoplay"/>');

			$('.audiojs').remove();
			$pai.append(embed);

			audiojs.events.ready(function() {
				var as = audiojs.createAll();
			});
		});
	});
	</script>
</head>
<body>
	
	<form action="" class="clear box-sizing pesquisa" id="home">
		<div id="home-menu">
			<a href="./">Home</a>
			<a href="upload.php">Upload</a>
		</div>
		
		<div id="home-logo"></div>

		<div id="home-input" class="box-sizing">
			<input name="key" value="<?php echo (isset($_GET['key'])? $key: null);?>" class="box-sizing" placeholder="Pesquise por suas músicas preferidas...">
		</div>
	</form>

	<div class="box-sizing" id="lista">
		<?php
			if($seleciona->num_rows){

				while($row=$seleciona->fetch_object()){
					if(file_exists("m-s/$row->link")){
						echo "<span mus=\"m-s/{$row->link}\">
								<a href=\"javascript:void(0)\" class=\"ouvir\">Ouvir</a> - <a onClick=\"alert('Todo conteudo postado no site é de total responsabilidade de quem posta e não dos autores do site!');\" href=\"download.php?mus={$row->key}\">Download:</a> {$row->titulo} / {$row->artista} <br/><br/>
							  </span>";
					}
				}
			} else {

				echo "<div id=\"desconhecido\">
						Desculpe, não encontramos nada <br/> com este termo... =\
					</div>";
			}
		?>
	</div>

</body>
</html>