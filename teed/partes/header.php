<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?php echo $site->name;?> - Tadeu Barbosa</title>
        <link rel="stylesheet" href="css/estrutura.css" />
        <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
        <script type="text/javascript" src="js/cookie.js"></script>
        <script type="text/javascript" src="js/functions.js"></script>
        <script>
        $(function(){
            var pathname = window.location.pathname.replace('/teed/','');
            pathname = pathname=='' ? 'index.php' : pathname;
            $('#template-topo-centro-menu li a[href="'+pathname+'"]').css('color','rgba(255,255,255,.3)');
            
        });
        </script>
    </head>
    <body>
        
        <div class="box-sizing" id="template-topo">
            
            <div class="box-sizing" id="template-topo-centro">
                
                <div class="clear">
                    <div id="template-topo-centro-logo"></div>
                    <div id="template-topo-centro-anuncio">anuncie</div>
                </div>
                
                <div class="box-sizing" id="template-topo-centro-menu">
                    <a class="template-topo-centro-menu-links" href="index.php"> Home <span>pagina inicial</span> </a>
                    <a class="template-topo-centro-menu-links" href="loja.php"> Loja Virtual <span>tudo baratinho</span> </a>
                    <a class="template-topo-centro-menu-links" href="palavras.php"> Palavras <span>Deus</span> </a>
                    <a class="template-topo-centro-menu-links" href="sobre.php"> Sobre <span>saiba mais</span> </a>
                    
                    <div class="box-sizing" id="template-topo-centro-menu-car">
                        <div id="template-topo-centro-menu-car-centro">
                            <ul id="template-topo-centro-menu-car-centro-itens"></ul>
                            
                            <div id="template-topo-centro-menu-car-centro-vazio">
                                Carrinho Vazio
                            </div>
                            
                            <div id="template-topo-centro-menu-car-centro-total">
                                Total R$ <span>0</span> | <a target="_blank" href="meu-carrinho.php">Finalizar</a> | <a class="esvaziar-carrinho" href="javascript:void(0)">Esvaziar</a>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            
        </div>