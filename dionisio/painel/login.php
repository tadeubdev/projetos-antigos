<?php
	if(isset($_COOKIE['uid'])){header("Location: index.php"); exit();}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <link rel="stylesheet" href="../css/estrutura.css" />
        <link rel="stylesheet" href="../css/jquery-ui.css" />
        <script type="text/javascript" src="../js/jquery-1.8.3.min.js"></script>
        <script type="text/javascript" src="../js/jquery-ui.js"></script>
        <style>#painel{-moz-box-sizing:border-box;-webkit-box-sizing:border-box;bottom:0;box-sizing:border-box;height:300px;left:0;margin:auto;position:absolute;right:0;top:0;width:400px}input[type=text],input[type=password],button{display:block;margin:10px 0}span{background:#EEE;display:block;font-size:13px;margin:10px 0;padding:10px}span:hover{background:#DDD}input[type=text],input[type=password]{border:1px solid #CCC;padding:5px 10px;width:90%}button{margin:0 auto!important}.resultado{-moz-box-sizing:border-box;-webkit-box-sizing:border-box;background:#DDD;background-position:10px center;background-repeat:no-repeat;background-size:20px;border:1px dotted #999;box-sizing:border-box;color:#777;display:none;font-size:13px;height:30px;line-height:30px;margin:10px 0;text-align:center;width:100%}.msg-alerta{background-color:#faf8b8!important;background-image:url(../img/alerta_1.png)!important;border-color:#dbd75f!important;color:#9f9b33!important}.msg-erro{background-color:#f9d8d6!important;background-image:url(../img/alerta_2.png)!important;border-color:#d89995!important;color:#d89995!important}.msg-avaliado{background-color:#caf1c7!important;background-image:url(../img/avaliado.png)!important;border-color:#4bb044!important;color:#4bb044!important}
        </style>
        <script>
            $(function(){
                
                $('#painel').tabs();
                
                $('button').button();
                
                function $_msg(onde, msg, tipo){
                    $('#resultado-'+onde).attr('class','resultado msg-'+tipo).fadeIn(400).html(msg);
                }
                
                ////
                ///////
                $('#logar').click(function(){
                    var email = $('#login-email'),
                    senha = $('#login-senha'),
                    email_val = $.trim( email.val() ),
                    senha_val= $.trim( senha.val() ),
                    filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/,
                    lembrar_senha = $('#lembrar').is(':checked');
                    
                    if(!email_val){
                        email.focus();
                        $_msg('login','Por favor, insira um email!','alerta');
                    } else if(!filter.test(email_val)){
                        email.focus();
                        $_msg('login','Este email &eacute; inv&aacute;lido!','erro');
                    } else if(!senha_val){
                        senha.focus();
                        $_msg('login','Por favor, insira uma senha!','alerta');
                    } else {
                        
                        $.post('../config/functions.php',{action:'login',email:email_val},
                            function(ret){
                                
								switch(ret){
									//////////
									case 'nao-existe':
										$_msg('login','Este email n&atilde;o est&aacute; cadastrado !','erro');
										break;
									/////////
									case 'senha':
										$_msg('login','Senha incorreta !','erro');
										break;
									/////////
									case 'efetuado':
										$_msg('login','Login Efetuado !','avaliado');
										$('#efetuar-login').submit();
										break;
									/////////
									default:
										$_msg('login','Erro! Tente novamente mais tarde!','erro');
										break;
									/////////
								}
								
                        });
						
                    }
                    
					return false;
					
                });
                ///////
                ////
                
                
            });
        </script>
    </head>
    <body>
        
        <div id="painel">
            
            <ul>
                <li> <a href="#painel-login">Login</a> </li>
                <li> <a href="#painel-cadastro">Cadastro</a> </li>
            </ul>
            
            <div>
                <div id="painel-login">
				
                    <form id="efetuar-login" action="index.php" method="post">
					
						<input name="email" type="text" id="login-email" placeholder="Email"/>
						
						<input name="pass" type="password" id="login-senha" placeholder="Senha">
						
						<span> <input type="checkbox" checked="checked" id="lembrar" /> Lembrar minha senha</span>
						
						<button id="logar">Efetuar Login</button>
						
						<div class="resultado" id="resultado-login">Insira um email !</div>
						
                    </form>
					
                </div>
                
                <div id="painel-cadastro">
				
                    <form id="efetuar-cadastro" ction="index.php" method="post">
					
						<input name="email" type="text" id="cadastro-email" placeholder="Email"/>
						
						<input name="pass" type="password" id="cadastro-senha" placeholder="Senha"> <br/><br/>
						
						<button id="cadastrar">Cadastrar</button>
						
						<div class="resultado" id="resultado-cadastro">Insira um email !</div>
					
                    </form>
					
                </div>
                
            </div>
            
        </div>
        
    </body>
</html>
