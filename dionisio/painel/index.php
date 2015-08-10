<?php
	if(!isset($_COOKIE['uid'])){header("Location: index.php"); exit();}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <link rel="stylesheet" href="css/estrutura.css" />
        <link rel="stylesheet" href="../css/jquery-ui.css" />
        <script type="text/javascript" src="../js/jquery-1.8.3.min.js"></script>
        <script type="text/javascript" src="../js/jquery-ui.js"></script>
		<script>
		$(function(){
			
			$('#template-topo-menu a').menu();
			
		});
		</script>
    </head>
    <body>
        
		<div id="template">
			
			<div id="template-topo">
				
				<div id="template-topo-logo">Admin</div>
				
				<ul class="clear" id="template-topo-menu">
					<li> <a href="index.php">Home</a> </li>
				</ul>
				
			</div>
			
			<div id="template-conteudo">
				centro
			</div>
			
			<div id="template-rodape">
				rodape
			</div>
			
		</div>
		
    </body>
</html>
