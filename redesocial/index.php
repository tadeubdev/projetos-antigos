<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script src="js/jquery.min.js" type="text/javascript"></script>
        <link rel="stylesheet" href="css/estrutura.css" />
        <title></title>
        <script>
        $(function(){
            
            
            
        });
        </script>
    </head>
    <body>
        
        <div id="template">
            
            <div id="template-topo">
                
                <div id="template-menu">
                    <div> <a href="index.php">home</a> </div>
                    <div> <a href="perfil.php">perfil</a> </div>
                    
                    <div id="template-topo-search">
                        <input type="text" placeholder="Search" />
                        <button>Buscar</button>
                    </div>
                    
                    <div class="clear"></div>
                </div>
                
                <div id="template-topo-logo">
                    Look ☺
                </div>
                
            </div>
            
            <div id="template-centro">
                
                <div id="template-centro-new-post">
                    <textarea placeholder="Nova Postagem"></textarea> <br>
                    <button>Postar</button>
                </div>
                
                <div>
                    
                </div>
                
            </div>
            
        </div>
        
        <div id="rodape">
            @ 2012 - <?php echo date('Y');?> || Tadeu Barbosa &copy; Todos os Direitos Reservados <br/>
            <a href="index.php">Home</a> |
            <a href="index.php">Sobre</a> | 
            <a href="index.php">Quem Somos</a>
        </div>
        
        <div id="barra-bottom">
            
        </div>
        
    </body>
</html>
