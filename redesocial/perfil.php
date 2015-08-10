<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!--        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js" type="text/javascript"></script>-->
        <script src="js/jquery.min.js" type="text/javascript"></script>
        <link rel="stylesheet" href="css/estrutura.css" />
        <link rel="stylesheet" href="css/perfil.css" />
        <title>Perfil | Rede</title>
        <script>
        $(function(){

            $('#template-topo-user-lista-amizade').toggle(function(){
                $(this).attr('class', 'template-topo-user-lista-amizade-remover').html('Remover Amigo');
            },function(){
                $(this).attr('class', 'template-topo-user-lista-amizade-adc').html('Adicionar aos Amigos');
            });

            $('#template-topo-user-foto').live('mouseover', function(){
                $('#template-topo-user-foto div').show();
            });

            $('#template-topo-user-foto').live('mouseout', function(){
                $('#template-topo-user-foto div').hide();
            });

            $('#template-menu-lateral-amigos-busca').live('keypress keyup keydown', function(e){
                var $this = $(this),
                valor = $.trim($this.val()),
                verifica = $('#template-menu-lateral-amigos-box div[key*="'+valor+'"]');

                if(valor){

                    if(verifica.length){
                        $('#template-menu-lateral-amigos-box div, #template-menu-lateral-amigos-box-nada').hide();
                        verifica.show();
                    } else {
                        $('#template-menu-lateral-amigos-box-nada').show();
                        $('#template-menu-lateral-amigos-box div').hide();
                    }

                } else {
                    $('#template-menu-lateral-amigos-box-nada').hide();
                    $('#template-menu-lateral-amigos-box div').show(300);
                }
            });


            $('#template-perfil-menu div').live('click', function(){
                var $this = $(this), index = $this.index(), aba = $('#template-perfil-abas div');
                if(aba.eq(index).css('display')=='none'){
                    aba.hide();
                    aba.eq(index).show();
                }
            });

        });
        </script>
    </head>
    <body>

        <?php

        setcookie('i', 1, time() + (31*24*3600) );

        require_once 'config/load.php';

        Usuarios::start($_COOKIE['i']);

        ?>

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

                <div id="template-topo-user">

                    <div id="template-topo-user-foto" style="background-image:url('img/<?php echo Usuarios::$img;?>');"><div>Alterar Imagem</div></div>

                    <div id="template-topo-user-nome">
                        <?php
                            $first_name = Usuarios::$first_name;
                            $last_name = Usuarios::$last_name;

                            echo "$first_name <span>$last_name</span>";
                        ?>
                    </div>

                    <div id="template-topo-user-lista">

                        <div>
                            <div> <?php echo Usuarios::$genero; ?> </div>
                            <div> <?php echo Usuarios::$relacionamento; ?> </div>
                            <div> <?php echo Usuarios::$cidade ." ". Usuarios::$estado; ?> </div>
                            <div> <?php echo Usuarios::$escolaridade; ?> </div>
                        </div>

                        <div>
                            <div> <?php echo Usuarios::$nasc_dia . "/" . Usuarios::$nasc_mes . "/" . Usuarios::$nasc_ano; ?> </div>
                            <div> -- </div>
                            <div> -- </div>
                            <div> -- </div>
                        </div>

                        <div>
                            <div> -- </div>
                            <div> -- </div>
                            <div> -- </div>
                            <div> -- </div>
                        </div>

                        <div class="clear"></div>
                    </div>
                </div>

            </div>


            <div id="template-perfil">

                <div id="template-perfil-menu">
                    <div> Feed </div>
                    <div> Sobre </div>
                    <div> Fotos </div>
                    <div> Videos </div>
                    <div class="clear"></div>
                </div>

                <div id="template-perfil-abas">
                    <div>

                        Feed ...

                    </div>

                    <div> Sobre ... </div>

                    <div> Fotos ... </div>

                    <div> Videos ... </div>
                </div>

            </div>


            <div id="template-menu-lateral">

                <div id="template-menu-lateral-amigos" class="template-menu-lateral-box">
                    <div class="template-menu-lateral-box-titulo"> Amigos </div>

                    <div class="template-menu-lateral-box-conteudo">
                        <input type="text" id="template-menu-lateral-amigos-busca" placeholder="Buscar Amigos" />

                        <div id="template-menu-lateral-amigos-box-nada"> Nada Encontrado </div>

                        <div id="template-menu-lateral-amigos-box">
                            <?php
                                foreach(Usuarios::$amigos as $value){
                                    $id = $value['cod_user'];
                                    $nome = $value['first_name'] ." ". $value['last_name'];
                                    $key = strtolower($nome);
                                    $img = $value['img'];

                                    echo "
                                        <a href=\"user.php?id=$id\"> <div title=\"$nome\" key=\"$key\" style=\"background-image:url(img/$img);\"></div> </a>
                                    ";
                                }
                            ?>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="clear"></div>

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
