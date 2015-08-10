<?php
	session_start();
	
	if(!isset($_SESSION['login'])){
		header("Location: login.php");
		exit();
	}
	
	//include'config.php';
	
	//Conecta::start();
	
	//$user = $_SESSION['login'];
	
	//$usuario = Conecta::perfil($user);
	
?>
<html>
	<head>
		<meta charset='utf-8'/>
		<title>Agenda</title>
		<style>
		*{
			padding:0;
			margin:0;
			list-style:none;
			font-family:tahoma;
		}
		
		html,body{
			height:100%;
		}
		
		body{
			background:#DDD;
			color:#888;
		}
		
		.clear:after{
			content: ".";
			height: 0;
			clear: both;
			display: block;
			overflow: hidden;
			visibility: none;
		}
		</style>
		<script type='text/javascript' src='latest.js'></script>
		<script>
		$(function(){
			
			
			
		});
		</script>
	</head>
	<body>
		
		<div id='template'>
			
			
			
		</div>
		
	</body>
</html>