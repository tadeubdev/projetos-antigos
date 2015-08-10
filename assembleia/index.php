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

                $('#template-topo').css('background-image','url("<?php echo $back;?>")');

                var pathname = window.location.pathname.split('/');
                pathname = pathname[2]||'index.php';
                $('#template-menu li a[href="'+pathname+'"]').addClass('template-menu-sel');

            });
        </script>
        <style>
            #post li{
                padding: 10px;
                border-bottom: 1px dotted #999;
            }
            #post div{
                border: 1px solid #999;
                background-color: #CCC;
                background-size: cover;
            }

            #post .unica{
                float: left;
                width: 394px;
                height: 300px;
            }

            #post .duplo{
                float: left;
                width: 194px;
                height: 195.7px;
                margin: 0 2px;
            }

            #post .triplo{
                float: left;
                width: 128px;
                height: 100px;
                margin: 0 2px;
            }

            #post .multi-princ{
                float: left;
                width: 253px;
                height: 250px;
                margin: 1px;
            }

            #post .multi{
                width: 138px;
                height: 82px;
                margin: 0 0 3px 2px;
            }

            #post .multi-recebe{
                float: left;
                border: 0;
            }

            #post .multi-mais{
                width: 138px;
                height: 82px;
                margin: 0 0 2px 2px;
                text-align: center;
                line-height: 82px;
                font-size: 14px;
                color: #777;
            }

            #post .multi-mais:hover{
                background: #DDD;
            }
        </style>
    </head>
    <body>
        <div class="clear box-sizing" id="template-menu">
            <a href="index.php">Home</a>
            <a href="perfil.php">Perfil</a>
            <a href="feed.php">Feed</a>
        </div>

        <div class="clear box-sizing" id="template">

            <div class="box-sizing" id="template-topo">
                Assembléia de Deus
            </div>

            <div class="clear box-sizing" id="template-conteudo">

                <div class="clear box-sizing" id="template-conteudo-central">

                    <ul id="post">
                        <li>
                            texto
                        </li>

                        <li class="clear">
                            <div class="unica" style="background-image:url('img/backs/background (1).jpg');"></div>
                        </li>

                        <li class="clear">
                            <div class="duplo" style="background-image:url('img/backs/background (2).jpg');"></div>
                            <div class="duplo" style="background-image:url('img/backs/background (4).jpg');"></div>
                        </li>

                        <li class="clear">
                            <div class="triplo" style="background-image:url('img/backs/background (3).jpg');"></div>
                            <div class="triplo" style="background-image:url('img/backs/background (1).jpg');"></div>
                            <div class="triplo" style="background-image:url('img/backs/background (6).jpg');"></div>
                        </li>

                        <li class="clear">
                            <div class="multi-princ" style="background-image:url('img/backs/background (3).jpg');"></div>
                            <div class="multi-recebe">
                                <div class="multi" style="background-image:url('img/backs/background (3).jpg');"></div>
                                <div class="multi" style="background-image:url('img/backs/background (1).jpg');"></div>
                                <a href="#"> <div class="multi-mais">+2</div> </a>
                            </div>
                        </li>

                    </ul>

                </div>

                <div class="clear box-sizing" id="template-conteudo-menu">

                    <div>
                        <div class="template-conteudo-menu-titulo"> Titulo </div>

                        <div class="template-conteudo-menu-conteudo">
                            Conteudo
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <div class="clear box-sizing" id="template-rodape">
            @ 2013 - <?php echo date('Y');?> || Assembléia de Deus &copy; Todos os Direitos Reservados <br/>
            <a href="index.php">Home</a> |
            <a href="index.php">Sobre</a> |
            <a href="index.php">Quem Somos</a>
        </div>

    </body>
</html>
