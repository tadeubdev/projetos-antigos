<?php
    include 'config/load.php';
    $usuario = Usuarios::start(1);

    $files = glob("img/backs/*");
    $back = $files[rand(0, count($files)-1)];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Assembleia de Deus - Caete</title>
        <link rel="stylesheet" href="css/template.css" />
        <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
        <script>
            $(function(){
                $('#template-topo').css('background-image','url("<?php echo $back?>")');

                var pathname = window.location.pathname.split('/');
                pathname = pathname[2]||'index.php';
                $('#template-menu li a[href="'+pathname+'"]').addClass('template-menu-sel');
            });
        </script>
    </head>
    <body>

        <ul id="template-menu">
            <li> <a href="index.php">Home</a> </li>
            <li> <a href="perfil.php">Perfil</a> </li>
            <li> <a href="feed.php">Feed</a> </li>
        </ul>

        <div id="template">

            <div id="template-topo">
                <div id="template-topo-user"></div>
                &nbsp;&nbsp; Tadeu Barbosa
            </div>

            <div id="template-conteudo">

                <div id="template-conteudo-central">
                    conteudo
                </div>

                <ul id="template-conteudo-menu">

                    <li>
                        <div class="template-conteudo-menu-titulo"> Titulo </div>

                        <div class="template-conteudo-menu-conteudo">
                            Conteudo
                        </div>
                    </li>

                </ul>

                <div class="clear"></div>

            </div>

        </div>

        <div id="template-rodape">
            @ 2013 - <?php echo date('Y');?> || Assembléia de Deus &copy; Todos os Direitos Reservados <br/>
            <a href="index.php">Home</a> |
            <a href="index.php">Sobre</a> |
            <a href="index.php">Quem Somos</a>
        </div>

    </body>
</html>
