<?php include 'config/load.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Palavra e Oração</title>
        <link rel="stylesheet" href="css/estrutura.css" />
        <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
        <script type="text/javascript" src="js/jquery.elastic.js"></script>
        <script>
            $(function(){
                
                
                
            });
        </script>
    </head>
    <body>
        
        <div id="template">
            
            <div class="clear box-sizing" id="template-topo">
                
                <div id="template-topo-logo"></div>
                
                <div id="template-topo-lateral">
                    
                    <div class="clear box-sizing" id="template-topo-lateral-menu">
                        <a class="box-sizing" href="index.php">Home</a>
                    </div>
                    
                    <div class="clear box-sizing" id="template-topo-lateral-imagem">
                        <div style="background-image:url('img/mic (5).jpg');"></div>
                        <div style="background-image:url('img/mic (2).jpg');"></div>
                        <div style="background-image:url('img/mic (1).jpg');"></div>
                        <div style="background-image:url('img/mic (4).jpg');"></div>
                        <div style="background-image:url('img/mic (1).jpg');"></div>
                        <div style="background-image:url('img/mic (6).jpg');"></div>
                    </div>
                    
                </div>
                
            </div>
            
            <div class="clear box-sizing" id="template-centro">
                
                <div class="box-sizing" id="template-centro-lateral">
                    
                    <div id="template-centro-lateral-busca">
                        <input class="box-sizing" type="text" placeholder="Procurar"/>
                        <button class="box-sizing">Buscar</button>
                    </div>
                    
                    <div class="template-centro-lateral-menu">
                        <span class="template-centro-lateral-menu-titulo">convites de amizade</span>
                        
                        <div id="template-centro-lateral-menu-conteudo-convites" class="template-centro-lateral-menu-conteudo">
                            
                            <div id="0001" class="clear template-centro-lateral-menu-conteudo-convites">
                                <div style="background-image:url('img/tadeu.jpg');"></div>
                                <span> <a href="user/tadeu">Tadeu Barbosa</a> quer ser seu amigo: <br/>
                                    <a class="aceitar-amizade" href="javascript:void(0)">Aceitar</a> | <a class="recusar-amizade" href="javascript:void(0)">Recusar</a>
                                </span>
                            </div>
                            
                            <div id="0002" class="clear template-centro-lateral-menu-conteudo-convites">
                                <div style="background-image:url('img/mic (5).jpg');"></div>
                                <span> <a href="user/micheli">Micheli Barbosa</a> quer ser seu amigo: <br/>
                                    <a class="aceitar-amizade" href="javascript:void(0)">Aceitar</a> | <a class="recusar-amizade" href="javascript:void(0)">Recusar</a></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="template-centro-lateral-menu">
                        <span class="template-centro-lateral-menu-titulo">últimos usuários</span>
                        
                        <div id="template-centro-lateral-menu-conteudo-ultimos" class="template-centro-lateral-menu-conteudo">
                            <a href="user/tadeu">
                                <div class="clear template-centro-lateral-menu-conteudo-ultimos">
                                    <div style="background-image: url('img/tadeu.jpg');"></div>
                                    <span>Tadeu Barbosa</span>
                                </div>
                            </a>

                            <a href="user/micheli">
                                <div class="clear template-centro-lateral-menu-conteudo-ultimos">
                                    <div style="background-image:url('img/mic (5).jpg');"></div>
                                    <span>Micheli Barbosa</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    
                    <div class="template-centro-lateral-menu">
                        <span class="template-centro-lateral-menu-titulo">Grupos</span>
                        
                        <div id="template-centro-lateral-menu-conteudo-grupos" class="template-centro-lateral-menu-conteudo">
                            
                            <a href="grupo/assembleia-de-deus">
                                <div class="clear template-centro-lateral-menu-conteudo-grupos">
                                    <div style="background-image:url('img/mic (5).jpg');"></div>
                                    <span>Assembléia de Deus</span>
                                </div>
                            </a>
                            
                            <a href="grupo/jovens">
                                <div class="clear template-centro-lateral-menu-conteudo-grupos">
                                    <div style="background-image:url('img/mic (5).jpg');"></div>
                                    <span>Jovens</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    
                </div>
                
                <div class="clear box-sizing" id="template-centro-conteudo">
                    
                    <div class="clear box-sizing" id="template-centro-conteudo-novo">
                        <textarea class="box-sizing" placeholder="Nova Postagem"></textarea>
                        <div class="clear box-sizing" id="template-centro-conteudo-novo-menu">
                            <button>Postar</button>
                        </div>
                    </div>
                    
                    <div class="box-sizing" id="template-centro-conteudo-posts">
                        
                        <div class="clear box-sizing template-centro-conteudo-post">
                            df
                        </div>
                        
                    </div>
                    
                </div>
                
            </div>
            
        </div>
        
    </body>
</html>
