<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title> LH Suplementos - Painel </title>
	<link rel="icon" href="../img/icon.png">
	<link rel="stylesheet" href="../css/admin.css">
	<script type="text/javascript" src="../js/jquery-1.8.3.min.js"></script>
	<script>
	$(function(){

	});
	</script>
</head>
<body>
	
	<div class="clear box-sizing" id="template">
		<div class="clear box-sizing" id="template-topo">
			<div class="box-sizing" id="template-topo-dados">
				<?php
					switch( 5 ){
						case 0:
							echo sprintf("Seja Bem-Vindo <strong>%s</strong>! Você não possui nenhum produto até agora...", "Tadeu Barbosa", 1);
							break;
						##########
						case 1:
							echo sprintf("Seja Bem-Vindo <strong>%s</strong>! Você possui <strong>um</strong> produto até agora!", "Tadeu Barbosa", 1);
							break;
						##########
						default:
							echo sprintf("Seja Bem-Vindo <strong>%s</strong>! Você possui <strong>%s</strong> produtos até agora!", "Tadeu Barbosa", 5);
							break;
						##########
					}

					switch( 1 ){
						case 0:
							echo "<span style='float:right;'> Até agora nenhum produto foi vendido! </span>";
							break;
						##########
						case 1:
							echo sprintf("<span style='float:right;'> Até agora somente <strong>um</strong> produto foi vendido! ----- <strong>R$ </strong><i>%s</i> </span>", str_replace(".", ",", "515,51") );
							break;
						##########
						default:
							echo sprintf("<span style='float:right;'> Até agora foram vendidos <strong>%s</strong> produtos! ----- <strong>R$ </strong><i>%s</i> </span>", 3, str_replace(".", ",", "515,51") );
							break;
						##########
					}
				?>
			</div>

			<div id="template-topo-logo"> Administração </div>

			<div class="clear box-sizing" id="template-topo-menu">
				<a href="../">LH Suplementos</a>
				<a href="index.php">Home</a>
				<a href="index.php">Create</a>
				<a href="index.php" id="template-topo-menu-msg">Mensagens <span>1</span></a>
				<a id="logout" title="Logout" href="javascript:void(0)">Logout</a>
			</div>
		</div>

		<div class="clear box-sizing" id="template-conteudo">
			
		</div>
	</div>

</body>
</html>