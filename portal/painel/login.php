<?php
    if(isset($_COOKIE['i'])){header("Location: index.php");}
?>
<html>
    <head>
        <title>  </title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="css/estrutura.css" />
        <script type="text/javascript" src="../js/jquery-1.8.3.min.js"></script>
        <style>

        #conteudo{
            text-align: center;
            color: #CCC;
            padding: 20%;
        }

        input{
            margin: 10px;
            width: 250px;
            height: 40px;
            padding: 10px;
            border: 1px solid #DDD;
            border-radius: 5px;
            box-shadow: inset 0 0 40px #DDD;
            color: #555;
        }

        input:focus{
            outline: none;
        }

        button{
            cursor: pointer;
            margin: 10px;
            width: 150px;
            height: 40px;
            padding: 10px;
            border: 1px solid #CCC;
            border-radius: 5px;
            background: #DDD;
            box-shadow: inset 0 0 20px rgba(0,0,0, .08);
            color: #555;
        }

        button:active{
            box-shadow: inset 0 0 30px #93dfff;
        }

        #msg{
            width: 600px;
            margin: 10px auto 20px auto;
            height: 40px;
            line-height: 40px;
            display: none;
        }

        #msg.erro{
            background: #ff5959;
            color: #FFF;
            border: 1px dotted #d92929;
        }

        #msg.alerta{
            background: #cbe3eb;
            border: 1px dotted #335d6b;
            color: #335d6b;
        }

        #msg.certo{
            background-color: #c2e9b5;
            background-image: url('../../img/loading.gif');
            background-repeat: no-repeat;
            background-position: 20px center;
            border: 1px dotted #5c834f;
            color: #5c834f;
        }

        </style>
        <script>
         $(function(){
             
             $('input').live('keypress', function(e){
                 if(e.which==13){ verifica(); }
             });
             
             $('button').live('click', function(e){
                 verifica();
             });
             
             function verifica(){
                var email = $('#email').val(),
                senha = $('#senha').val(),
                $msg = $('#msg');
                var pattern=/^([a-zA-Z0-9_.-])+@([a-zA-Z0-9_.-])+\.([a-zA-Z])+([a-zA-Z])+/;
                
                if(email==''){
                    $msg.html('Insira um Email').attr('class', 'alerta').fadeIn(200);
                    $('#email').focus();
                } else if(!pattern.test(email)) {
                    $msg.html('Email Invalido ['+email+']').attr('class', 'alerta').fadeIn(200);
                    $('#email').focus();
                } else if(senha==''){
                    $msg.html('Insira uma Senha').attr('class', 'alerta').fadeIn(200);
                    $('#senha').focus();
                } else {
                    $msg.html('Verificando').attr('class', 'certo');
                    
                    $.post('acoes.php', {acao:'login', email:email, senha:senha}, function(retorno){
                        $msg.show().html(retorno).css('background-image', 'url("")');
                    });
                }
             }
             
         });
        </script>
    </head>
<body>
    <!--[if IE]>
    <div id="ie">
       Este site não funcionará perfeitamente no Internet Explorer ...  <br/>
       É aconselhavel visualizar em outros navegadores !!
    </div>
    <![endif]-->
    
    <div id="template">
        
        <div id="conteudo">
            Favor efetuar login ! <br><br>
            
            <input type="text" id="email" placeholder="Email" />
            
            <input type="password" id="senha" placeholder="Senha" />
            
            <button id="logar">Login</button>
            
            <div id="msg"></div>
            
        </div>
        
    </div>

</body>
</html>