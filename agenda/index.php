<?php
	session_start();

	if(!isset($_SESSION['login'])){
		header("Location: login.php");
		exit();
	}

	include'config.php';

	Conecta::start();

	$user = $_SESSION['login'];

	$usuario = Conecta::perfil($user);

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

		.clear{
			clear:both;
		}

		input,textarea:focus{
			outline:none;
		}

		#template{
			width:100%;
		}

		#template-centro{
			width:60%;
			min-height:100%;
			float:left;
			box-sizing:border-box;
			border-right:1px dotted #999;
		}

		#template-centro h1{
			text-align:center;
			text-transform:capitalize;
			padding:30px 20px;
			border-bottom:1px dotted #999;
			background:rgba(0,0,0,.1);
		}

		#logout{
			font-size:25px;
			color: #8c3;
			cursor:pointer;
		}

		#template-centro-lista{

		}

		#template-centro-lista li{
			padding:20px;
			border-bottom: 1px dotted #999;
			background: rgba(255,255,255, .3);
		}

		#template-centro-lista .data{
			padding-top: 10px;
			font-size:12px;
			color:#c98;
		}

		#template-centro-lista .conteudo{
			width: 600px;
			font-size: 15px;
		}


		#template-lateral{
			width:40%;
			height:100%;
			position:fixed;
			right:0;
			float:left;
			box-sizing:border-box;
			padding:20px;
			font-size:40px;
			color:rgba(0,0,0,.09);
		}

		#template-lateral textarea{
			width:100%;
			height:200px;
			resize:none;
			padding:5px 10px;
			font-size:20px;
			display:block;
			margin:20px 0;
			border: 1px solid #CCC;
			background:rgba(255,255,255, .4);
		}

		#postar{
			width:180px;
			padding:7px 20px;
			border:1px solid #CCC;
			border-radius:5px;
			cursor:pointer;

			right:0;
			left:0;
			margin: 10px 0;

			color: #777;
			box-shadow: inset 0 0 20px rgba(0,0,0, .1);
		}

		.excluir{
			float:right;
			font-size:12px;
			color:rgba(255,0,0,.5);
			cursor:pointer;
		}

		</style>
		<script type='text/javascript' src='latest.js'></script>
		<script>
		$(function(){

			$('#postar').live('click', function(){
				var $this = $(this),
				valor = $('#conteudo').val();

				if(!valor){
					alert('Insira um conteudo !');
				} else {
					$.post('action.php',{action:'postar', valor:valor},function(ret){

						ret = $.parseJSON(ret);

						$('<li/>')
							.attr('id', ret.id)
							.append('<span class="excluir">[remover]</span>')
							.append('<div class="conteudo">'+valor+"</div>")
							.append('<div class="data">'+ret.data+'</div>')
							.prependTo('#template-centro-lista');

						$('#conteudo').val('');

					})
				}
			});

			$('#logout').live('click',function(){

				$.post('action.php',{action:'logout'},function(ret){
					$('body').append(ret);
					location.href='login.php';
				});

			});

			$('.excluir').live('click',function(){
				var $this = $(this), pai = $this.parent(), id = pai.attr('id');

				if(confirm('Deseja remover?')){
					$.post('action.php',{action:'remover', id:id},function(ret){

						pai.fadeOut(300);

					});
				}
			});

		});
		</script>
	</head>
	<body>

		<div id='template'>

			<div id='template-centro'>

				<h1>Olá <?php echo $user; ?>! <span id='logout' href=''>sair</span> </h1>

				<ul id='template-centro-lista'>

					<?php
						$agenda = Conecta::$con->query("SELECT * FROM agenda WHERE user='{$user}' ORDER BY id DESC");

						if($agenda->num_rows){

							while($row = $agenda->fetch_object()){

								echo "
									<li id='$row->time'>
										<span class='excluir'>[remover]</span>
										<div class='conteudo'> $row->conteudo </div>
										<div class='data'> $row->data </div>
									</li>
								";

							}

						}
					?>

				</ul>

			</div>

			<div id='template-lateral'>

				Nova nota <br/>

				<textarea id='conteudo' placeholder='Conteudo'></textarea>

				<button id='postar'>Postar</button>

			</div>

			<div class='clear'></div>

		</div>

	</body>
</html>