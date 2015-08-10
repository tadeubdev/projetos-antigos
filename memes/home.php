<?php 
    if(isset($_COOKIE['i'])){header('Location: index.php');}
    include 'config/load.php';
    include'partes/header.php';
?>

<script>
    $(function(){
        
        ///////////
        // Var and Functions
            function $_msg(tipo, img, msg){
                var url = (img=='loading' ? 'url("img/loading.gif")' : 'url("img/'+img+'.png")');
                
                $('#template-login_cadastro-'+tipo+'-resultado')
                    .css('background-image', url)
                    .fadeIn(200)
                    .html(msg);
            }
        //
        //////////
        
        $('#template-login_cadastro-menu a').bind('click',function(){
            var $this = $(this), index = $this.index();
            
            $('#template-login_cadastro-menu a').removeClass('template-login_cadastro-menu-sel');
            $this.addClass('template-login_cadastro-menu-sel');
            
            $('.template-login_cadastro-painel').eq(index).is(':visible') ? null : $('.template-login_cadastro-painel').hide().eq(index).fadeIn(400);
        });
        
        
        $('#login').submit(function(e){
            var $this = $(this),
            email = $.trim( $this.children('input').eq(0).val() ),
            senha = $.trim( $this.children('input').eq(1).val() ),
            filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            
            if(!email){
                $this.children('input').eq(0).focus();
                $_msg('login', 'alerta', 'Insira um Email !!');
            } else if (!filter.test(email)){
                $this.children('input').eq(0).focus();
                $_msg('login', 'alerta', 'Este Email &eacute; inv&aacute;lido !!');
            } else if(!senha){
                $this.children('input').eq(1).focus();
                $_msg('login', 'erro', 'Insira uma senha!!');
            } else {
                
                $_msg('login', 'loading', 'Validando ... Por favor aguarde !!');
                
                $.post('config/action.php',{
                    action : 'login',
                    email : email,
                    senha : senha
                }, function(ret){
                    $('body').append(ret);
                    
                    switch(ret){
                        /////////////
                        case 'inexistente':
                            $_msg('login', 'erro', 'Contato n&atilde;o existe !!');
                            break;
                        /////////////
                        case 'senha':
                            $_msg('login', 'erro', 'Senha Incorreta !!');
                            break;
                        /////////////
                        case 'ok':
                            $_msg('login', 'correto', 'Tudo certo !!');
                            location.href = 'index.php';
                            break;
                        /////////////
                    }
                });
            }
            
            return false;
        });
        
    });
</script>

<div class="clear box" style="height:400px;" id="template-ultimos_usuarios">
    <?php
    $ultimos = array(
                    array(
                        'nome' => 'teed',
                        'img' => 'f7138e1164716c399ba932e863b0d6c2.jpg'
                    )
                );
    
    for($x=3; $x>=0; $x--){
        $nome = isset($ultimos[$x]['nome']) ? $ultimos[$x]['nome'] : null;
        $img = isset($ultimos[$x]['img']) ? "imgUsuarios/".$ultimos[$x]['img'] : null;
        echo "\n<div title=\"$nome\" class=\"template-ultimos_usuarios-img\" style=\"background-image:url('$img');\"></div>";
    }
    ?>
</div>

<div class="clear box" style="height:400px;" id="template-login_cadastro">

    <div class="clear" id="template-login_cadastro-menu">
        <a class="template-login_cadastro-menu-sel" href="javascript:void(0)">Login</a>
        <a href="javascript:void(0)">Cadastro</a>
    </div>
    
    <div class="template-login_cadastro-painel" id="template-login_cadastro-login">
        
        <form id="login" action="index.php">
            
            <input placeholder="Email" name="email" type="text"/>
            
            <input placeholder="Senha" name="pass" type="password"/>
            
            <div class="clear" id="template-login_cadastro-login-botoes">
                <button>Logar</button>
                <button type="reset">Cancelar</button>
            </div>
            
        </form>
        
        <div class="template-login_cadastro-resultados" id="template-login_cadastro-login-resultado"></div>
        
    </div>

    <div class="template-login_cadastro-painel" id="template-login_cadastro-cadastro">

        <input placeholder="Nome" name="firstname" type="text" maxlength="20" />

        <input placeholder="SobreNome" name="lastname" type="text" maxlength="20" />

        <input placeholder="Email" name="email" type="text" maxlength="150" />

        <input placeholder="Senha" name="pass" type="password" maxlength="10" />

        <input placeholder="Repita a Senha" name="passrepeat" type="password" maxlength="10" />

        <div class="clear" id="template-login_cadastro-cadastro-botoes">
            <button>Logar</button>
            <button>Cancelar</button>
        </div>
        
        <div class="template-login_cadastro-resultados" id="template-login_cadastro-cadastro-resultado"></div>
        
    </div>

</div>