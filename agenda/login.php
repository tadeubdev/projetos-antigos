<?php
	session_start();
	include'config.php';
	if(isset($_SESSION['login'])){
		header("Location: index.php");
	}
?>
<html>
	<head>
		<title>Agenda - Login</title>
		<link rel='stylesheet' href='style.css'/>
		<script type='text/javascript' src='latest.js'></script>
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
			color:#888;
		}

		.clear{
			clear:both;
		}
		
		#container{
			width: 400px;
			min-height:300px;
			
			position:absolute;
			right:0;
			left:0;
			margin: 14% auto;
			
			border: 1px solid #CCC;
		}
		
		#menu{
			border-bottom: 1px solid #CCC;
			background:#FEFEFE;
		}
		
		#menu li{
			float:left;
			cursor:pointer;
			font-size:20px;
			font-weight: bold;
			width: 120px;
			height:50px;
			line-height:50px;
			text-align:center;
			border-right: 1px solid #CCC;
		}
		
		#menu li.sel,
		#menu li:hover{
			color:#999;
			background: #EEE;
		}
		
		#conteudo{
			padding:10px;
		}
		
		#conteudo-cadastro{
			display:none;
		}
		
		input[type=text],input[type=password]{
			width:100%;
			padding:7px 10px;
			margin: 14px 0;
			border: 1px solid #EEE;
			color:#777;
			font-size:20px;
		}
		
		input[type=text]:focus,input[type=text]:hover,input[type=password]:hover,input[type=password]:focus{
			background:rgba(0,0,0, .04);
			outline:none;
		}
		
		button{
			width:180px;
			padding:7px 20px;
			border:1px solid #CCC;
			border-radius:5px;
			cursor:pointer;
			
			position:absolute;
			right:0;
			left:0;
			margin: 30px auto;
			
			color: #777;
			box-shadow: inset 0 0 20px rgba(0,0,0, .1);
		}
		
		</style>
		
		<script>
		$(function(){
			
			$('#menu li').live('click',function(){
				var $this = $(this),
				id = $this.attr('id').replace('menu','conteudo'),
				item = $('#'+id);
				
				if(item.is(':hidden')){
					$('#menu li').removeClass('sel');
					$this.addClass('sel');
					
					$('#conteudo li').hide();
					item.show();
				}
			});
			
			
			//////////////////
			////////////////////////////////
			$('#entrar').live('click',function(){
				$_login();
			});
			
			$('#conteudo-login input').live('keypress',function(e){
				if(e.which==13){
					$_login();
				}
			});
			
			function $_login(){
				var login = $('#conteudo-login input:eq(0)'),
				senha = $('#conteudo-login input:eq(1)'),
				login_val = $.trim( login.val() ),
				senha_val = $.trim( senha.val() );
				
				if(!login_val){
					alert('Insira um login!');
					login.focus();
				} else if(!senha_val){
					alert('Insira uma senha!');
					senha.focus();
				} else {
					
					$.post('action.php',{action:'login', login:login_val, senha:senha_val},function(ret){
						switch(ret){
							case 'nao':
								alert('Usuario nao existe!');
								break;
							/////////////
							case 'senha':
								alert('Senha incorreta!');
								senha.focus();
								break;
							/////////////
							case 'logado':
								location.href = 'index.php';
								break;
							/////////////
						}
					});
					
				}
			}
			////////////////////////////////
			//////////////////
			
			
			//////////////////
			////////////////////////////////
			$('#cadastrar').live('click',function(){
				$_cadastro();
			});
			
			$('#conteudo-cadastro input').live('keypress',function(e){
				if(e.which==13){
					$_cadastro();
				}
			});
			
			function $_cadastro(){
				var login = $('#conteudo-cadastro input:eq(0)'),
				senha = $('#conteudo-cadastro input:eq(1)'),
				login_val = $.trim( login.val() ),
				senha_val = $.trim( senha.val() );
				
				if(!login_val){
					alert('Insira um login!');
					login.focus();
				} else if(!senha_val){
					alert('Insira uma senha!');
					senha.focus();
				} else {
					
					$.post('action.php',{action:'cadastro', login:login_val, senha:senha_val},function(ret){
						
						switch(ret){
							case 'existe':
								alert('Usuario ja existe!');
								break;
							/////////////
							case 'cadastrado':
								location.href = 'index.php';
								break;
							/////////////
						}
					});
					
				}
			}
			////////////////////////////////
			//////////////////
			
			
		});
		</script>	
	</head>
	<body>
		
		<div id='container'>
			
			<ul id='menu'>
				<li id='menu-login'class='sel'>Login</li>
				<li id='menu-cadastro'>Cadastro</li>
				<div class='clear'></div>
			</ul>
			
			<ul id='conteudo'>
			
				<li id='conteudo-login'>
					
					<input type='text' placeholder='Login'> <br/><br/>
					
					<input type='password' placeholder='Senha'> <br/>
					
					<button id='entrar'>Entrar</button>
					
				</li>
				
				<li id='conteudo-cadastro'>
					
					<input type='text' placeholder='Login'> <br/><br/>
					
					<input type='password' placeholder='Senha'> <br/>
					
					<button id='cadastrar'>Cadastrar</button>
					
				</li>
				
				<div class='clear'></div>
			</ul>
			
		</div>
		
	</body>
</html>