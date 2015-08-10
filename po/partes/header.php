<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <title> Palavra e Oração </title>
    <link rel="stylesheet" href="css/estrutura.css"/>
    <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
    <link rel="shortcut icon" href="img/icon.jpg">
</head>
<body>

<div class="clear box-sizing" id="template">

	<div class="clear box-sizing" id="template-topo">
		<div id="template-topo-logo"></div>

		<div class="clear box-sizing" id="template-topo-menu">
			<a href="index.php">Home</a>

		    <?php
			    if(isset($_COOKIE['lg'])) {
			    	echo "
						<a href=\"palavra.php\">Palavras</a>
						<a href=\"oracao.php\">Orações</a>
						<a href=\"user/{$user->url}\">Meu Perfil</a>
						<a href=\"logout.php\">Logout</a>

						<div id=\"template-topo-user\" style=\"background-image:url('{$user->img}');\"></div>
						";
			    }
		    ?>
		</div>
	</div>

	<div class="clear box-sizing" id="template-conteudo">