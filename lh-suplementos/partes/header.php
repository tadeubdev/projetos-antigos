<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <title>LH Suplementos - Home</title>
        <meta charset="UTF-8" />
        <link rel="icon" href="<?php echo URL; ?>img/icon.png">
        <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>css/estrutura.css"/>
        <script type="text/javascript" src="<?php echo URL; ?>js/jquery-1.8.3.min.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>js/cookie.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>js/class.js"></script>
        <script>
        $(function(){

            var top = $('#template-menu-principal').offset().top,
                head = $('head').offset().top;

            setInterval(function(){
                head = $('head').offset().top;

                if(head>=top){
                    $('#template-menu-principal').css({'width':'100%', 'position':'fixed', 'box-shadow':'0 9px 40px -15px #000'});
                    $('#template-menu-principal-topo').css({'width':'919px'});
                    $('#template-menu-principal-topo-busca input').css('margin-left','0');
                    $('.quinas').hide();

                } else {
                    $('#template-menu-principal').css({'width':'945px', 'position':'', 'box-shadow':''});
                    $('#template-menu-principal-topo').css({'width':'945px'});
                    $('#template-menu-principal-topo-busca input').css('margin-left','4px');
                    $('.quinas').show();
                }
            },100);

            if($.browser.msie){$('#template-menu-principal-topo-busca input').val('Pesquisa');}
        });
        </script>
    </head>
<body>

    <div id="template">
        
        <div class="clear box-sizing" id="template-topo">
        
            <div class="clear box-sizing" id="template-topo-menu">
                <div>
                    <span>Categorias</span>
                    <span>
                        <a class="box-sizing" href="<?php echo URL; ?>categoria/massa-muscular">MASSA MUSCULAR</a>
                        <a class="box-sizing" href="<?php echo URL; ?>categoria/emagrecimento">EMAGRECIMENTO</a>
                        <a class="box-sizing" href="<?php echo URL; ?>categoria/energia-e-resistencia">ENERGIA E RESISTÊNCIA</a>
                        <a class="box-sizing" href="<?php echo URL; ?>categoria/acessorios-esportivos">ACESSÓRIOS ESPORTIVOS</a>
                        <a class="box-sizing" href="<?php echo URL; ?>categoria/camisetas">CAMISETAS</a>
                    </span>
                </div>
                <a class="box-sizing" href="<?php echo URL; ?>contato.php">contato</a>
                <a class="box-sizing" href="<?php echo URL; ?>pedidos.php">pedidos</a>
                <a class="box-sizing" href="<?php echo URL; ?>sobre.php">sobre</a>
            </div>
                
            <div id="template-topo-logo"></div>
            
        </div>


        <div id="template-menu-principal">

            <div id="template-menu-principal-topo">

                <form onsubmit="if(!$('input[name=key]').val()){alert('Insira um valor...'); return false;}else{$('input[name=key]').val( $.trim($('input[name=key]').val()) );}" method="get" action="<?php echo URL; ?>pesquisa.php" class="clear" id="template-menu-principal-topo-busca">
                    <input name="key" <?php if(isset($_GET['key'])){echo sprintf('value="%s"',strip_tags($_GET['key']));}?> type="text" placeholder="Pesquisa"/>
                    <button></button>
                </form>
                
                <a href="<?php echo URL; ?>meu-carrinho.php" id="template-menu-principal-topo-carrinho"> <h3>Carrinho:</h3> <span>Vazio</span> </a>
                
                <div id="template-menu-principal-topo-itens">
                    <div id="template-menu-principal-topo-itens-cheio">
                        <ul id="template-menu-principal-topo-itens-ul"></ul>
                        <div id="template-menu-principal-topo-itens-total">Sub Total: R$ <span>0</span></div>
                        <div id="template-menu-principal-topo-itens-esvaziar">Esvaziar Carrinho</div>
                        <a href="<?php echo URL; ?>meu-carrinho.php" id="template-menu-principal-topo-itens-finalizar" title="Finalizar Compra">Finalizar Compra</a>
                    </div>
                    
                    <div  id="template-menu-principal-topo-itens-vazio">Carrinho Vazio</div>
                </div> 

                <img class="quinas" src="<?php echo URL; ?>img/quina-esquerda.fw.png" style="position:absolute; top:41px; left:0px;"/>
                <img class="quinas" src="<?php echo URL; ?>img/quina-direita.fw.png" style="position:absolute; top:41px; right:0px;"/> 
            </div>

        </div>