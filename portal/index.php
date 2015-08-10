<?php include 'config/load.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Portal</title>
        <link rel="stylesheet" href="css/estrutura.css" />
        <link rel="stylesheet" href="css/smoothness/jquery-ui-1.9.2.custom.min.css" />
        <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
        <script type="text/javascript" src="js/cookie.js"></script>
        <script>
            $(function(){

                $('.template-conteudo-resumos-li').bind('mouseover',function(){
                    var $this = $(this), img = "url("+$this.attr('id')+")";
                    $('.template-conteudo-resumos-li').css('background-color','#FFF');
                    $this.css('background-color','rgba(0,0,0, .1)');

                    $('#template-conteudo-resumos-imagem').css('background-image',img);
                });

                if($.cookie('nome')){
                    var nome = $.cookie('nome');
                } else {
                    var nome = prompt('Qual é o seu nome ?');
                    $.cookie('nome',nome,{expires:7});
                }

                $('#nome-user').html(nome);

                $('#template-conteudo-categorias-chat-conteudo-menu form').submit(function(e){
                    var $this = $(this), valor = $.trim($this.children('input').val()),
                    altu = $('#template-conteudo-categorias-chat-conteudo ul').get(0).scrollHeight;

                    if(!valor){
                        alert('Insira um valor!');
                    } else {

                        var data = new Date(),
                        dia = data.getDate()<10 ? "0"+data.getDate() : data.getDate(),
                        mes = (data.getMonth()+1)<10 ? "0"+(data.getMonth()+1) : (data.getMonth()+1),
                        ano = data.getFullYear()<10 ? "0"+data.getFullYear() : data.getFullYear(),
                        horas = data.getHours()<10 ? "0"+data.getHours() : data.getHours(),
                        min = data.getMinutes()<10 ? "0"+data.getMinutes() : data.getMinutes();

                        data = dia + "/" + mes + "/" + ano + " - " + horas + ":" + min;

                        $this.children('input').val('');

                        $.post('config/function.php',{
                            type : 'postar-no-chat', 'chat_nome' : nome, 'chat_conteudo' : valor
                        });

                        $('#template-conteudo-categorias-chat-conteudo ul')
                        .append(
                            $('<li/>')
                            .html(valor)
                            .prepend( $('<strong/>', {'html':'['+data+'] '+nome}) )
                        )
                        .animate({scrollTop:altu}, 'fast');
                    }

                    e.preventDefault();
                });

                $('#template-conteudo-categorias-chat-login').bind('click',function(){
                    $_campo_cadastro();
                });

                function $_campo_cadastro(){
                    $('html, body').animate({
                        scrollTop: $("#template-conteudo-registro-cadastro_login").offset().top-60
                    }, 500);
                }

                function $_atualizar_chat(){
                    var chat = $('#template-conteudo-categorias-chat-conteudo ul'),
                    last = (chat.children('li').size()==0 ? -1 : chat.children('li').size())

                    $.post('config/function.php',{
                        type:'ver-chat', last:last
                    },function(ret){
                        chat.append(ret);
                    });
                }

                $_atualizar_chat();

                setInterval(function(){
                    $_atualizar_chat();
                },2000);

                $('#trocar-nome').bind('click',function(){
                    nome = prompt('Qual é o seu nome ?');
                    $.cookie('nome',nome,{expires:7});
                    $('#nome-user').html(nome);
                });

            });
        </script>
    </head>
    <body>

        <div class="box-sizing" id="template">

            <div id="template-topo">

                <div class="box-sizing clear" id="template-topo-menu">
                    <a class="button" href="#">Notícias</a>
                    <a class="button" href="#">Entretenimento</a>
                    <a class="button" href="#">Esportes</a>
                    <a class="button" href="#">Vídeos</a>
                    <a class="button" href="#">Serviços</a>
                </div>

                <div class="clear">
                    <div id="template-topo-logo"></div>
                    <div id="template-topo-anuncio"></div>
                </div>

            </div>

            <div class="clear" id="template-conteudo">

                <div class="clear box" id="template-conteudo-topo">

                    <div class="clear" id="template-conteudo-resumos">
                        <div class="box-titulo">Últimas Notícias</div>

                        <ul class="clear">
                            <li id="img/tecnologia.jpg" class="box-sizing template-conteudo-resumos-li">
                                Lorem ipsum dolor sit amet, eiusmod tempor
                                incididunt ut labore et dolore magna aliqua.
                            </li>

                            <li id="img/tecnologia.jpg" class="box-sizing template-conteudo-resumos-li">
                                Lorem ipsum dolor sit amet, eiusmod tempor
                                incididunt ut labore et dolore magna aliqua.
                            </li>

                            <li id="img/tecnologia.jpg" class="box-sizing template-conteudo-resumos-li">
                                Lorem ipsum dolor sit amet, eiusmod tempor
                                incididunt ut labore et dolore magna aliqua.
                            </li>

                            <li id="img/tecnologia.jpg" class="box-sizing template-conteudo-resumos-li">
                                Lorem ipsum dolor sit amet, eiusmod tempor
                                incididunt ut labore et dolore magna aliqua.
                            </li>
                        </ul>

                        <div class="box-sizing" id="template-conteudo-resumos-imagem" style="background-image:url('img/tecnologia.jpg');"></div>
                    </div>

                    <div id="template-conteudo-envolve">

                        <div class="box-titulo">Leitores destaque</div>

                        <a href="#">
                            <div class="clear box-sizing template-conteudo-envolve">
                                <div class="box-sizing" style="background-image:url('img/tadeu.jpg');"></div> Tadeu Barbosa
                            </div>
                        </a>

                        <a href="#">
                            <div class="clear box-sizing template-conteudo-envolve">
                                <div class="box-sizing" style="background-image:url('img/tadeu.jpg');"></div> Tadeu Barbosa
                            </div>
                        </a>

                        <a href="#">
                            <div class="clear template-conteudo-envolve">
                                <div class="box-sizing" style="background-image:url('img/tadeu.jpg');"></div> Tadeu Barbosa
                            </div>
                        </a>

                        <a href="#">
                            <div class="clear box-sizing template-conteudo-envolve">
                                <div class="box-sizing" style="background-image:url('img/tadeu.jpg');"></div> Tadeu Barbosa
                            </div>
                        </a>

                    </div>

                </div>


                <div class="clear box" id="template-conteudo-top">

                    <div class="box-titulo">Top 3</div>

                    <div class="clear" id="template-conteudo-top-box">

                        <a href="#">
                            <div class="box-sizing template-conteudo-top-box">
                                <div class="box-sizing template-conteudo-top-box-img" style="background-image:url('img/tecnologia.jpg');"></div>
                                <div class="template-conteudo-top-box-titulo"> <span>#1</span> Titulo do post </div>
                            </div>
                        </a>

                        <a href="#">
                            <div class="box-sizing template-conteudo-top-box">
                                <div class="box-sizing template-conteudo-top-box-img" style="background-image:url('img/tecnologia.jpg');"></div>
                                <div class="template-conteudo-top-box-titulo"> <span>#2</span> Titulo do post </div>
                            </div>
                        </a>

                        <a href="#">
                            <div class="box-sizing template-conteudo-top-box">
                                <div class="box-sizing template-conteudo-top-box-img" style="background-image:url('img/tecnologia.jpg');"></div>
                                <div class="template-conteudo-top-box-titulo"> <span>#3</span> Titulo do post </div>
                            </div>
                        </a>

                    </div>

                </div>


                <div class="clear box" id="template-conteudo-categorias">

                    <div id="template-conteudo-categorias-box">

                        <div class="box-titulo">Categorias</div>

                        <div class="clear" id="template-conteudo-categorias-box-itens">

                            <div class="clear template-conteudo-categorias-box-item">
                                <div class="template-conteudo-categorias-box-item-titulo">
                                    <a style="color:#0066ff;" href="#">#Humor</a>
                                </div>

                                <div class="template-conteudo-categorias-box-item-resumo">
                                    <a href="#">Lorem ipsum dolor sit amet, eiusmod tempor incididunt ut labore et dolore magna aliqua.</a>
                                    <a href="#">Lorem ipsum dolor sit amet, eiusmod tempor incididunt ut labore et dolore magna aliqua.</a>
                                    <a href="#">Lorem ipsum dolor sit amet, eiusmod tempor incididunt ut labore et dolore magna aliqua.</a>
                                </div>
                            </div>

                            <div class="clear template-conteudo-categorias-box-item">
                                <div class="template-conteudo-categorias-box-item-titulo">
                                    <a style="color:olivedrab;" href="#">#Tecnologia</a>
                                </div>

                                <div class="template-conteudo-categorias-box-item-resumo">
                                    <a href="#">Lorem ipsum dolor sit amet, eiusmod tempor incididunt ut labore et dolore magna aliqua.</a>
                                    <a href="#">Lorem ipsum dolor sit amet, eiusmod tempor incididunt ut labore et dolore magna aliqua.</a>
                                    <a href="#">Lorem ipsum dolor sit amet, eiusmod tempor incididunt ut labore et dolore magna aliqua.</a>
                                </div>
                            </div>

                            <div class="clear template-conteudo-categorias-box-item">
                                <div class="template-conteudo-categorias-box-item-titulo">
                                    <a style="color:#009999;" href="#">#Novidades</a>
                                </div>

                                <div class="template-conteudo-categorias-box-item-resumo">
                                    <a href="#">Lorem ipsum dolor sit amet, eiusmod tempor incididunt ut labore et dolore magna aliqua.</a>
                                    <a href="#">Lorem ipsum dolor sit amet, eiusmod tempor incididunt ut labore et dolore magna aliqua.</a>
                                    <a href="#">Lorem ipsum dolor sit amet, eiusmod tempor incididunt ut labore et dolore magna aliqua.</a>
                                </div>
                            </div>

                            <div class="clear template-conteudo-categorias-box-item">
                                <div class="template-conteudo-categorias-box-item-titulo">
                                    <a style="color:#ff0033;" href="#">#Política</a>
                                </div>

                                <div class="template-conteudo-categorias-box-item-resumo">
                                    <a href="#">Lorem ipsum dolor sit amet, eiusmod tempor incididunt ut labore et dolore magna aliqua.</a>
                                    <a href="#">Lorem ipsum dolor sit amet, eiusmod tempor incididunt ut labore et dolore magna aliqua.</a>
                                    <a href="#">Lorem ipsum dolor sit amet, eiusmod tempor incididunt ut labore et dolore magna aliqua.</a>
                                </div>
                            </div>

                            <div class="clear template-conteudo-categorias-box-item">
                                <div class="template-conteudo-categorias-box-item-titulo">
                                    <a style="color:#c0d;" href="#">#Economia</a>
                                </div>

                                <div class="template-conteudo-categorias-box-item-resumo">
                                    <a href="#">Lorem ipsum dolor sit amet, eiusmod tempor incididunt ut labore et dolore magna aliqua.</a>
                                    <a href="#">Lorem ipsum dolor sit amet, eiusmod tempor incididunt ut labore et dolore magna aliqua.</a>
                                    <a href="#">Lorem ipsum dolor sit amet, eiusmod tempor incididunt ut labore et dolore magna aliqua.</a>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div id="template-conteudo-categorias-chat">

                        <div class="box-titulo">Chat</div>

                        <div style="display:none" class="box-sizing" id="template-conteudo-categorias-chat-login">Efetue Login para entrar no Chat!</div>

                        <div class="box-sizing" id="template-conteudo-categorias-chat-conteudo">

                            <ul class="box-sizing"></ul>

                            <div class="box-sizing clear" id="template-conteudo-categorias-chat-conteudo-menu">
                                <form>
                                    <input class="box-sizing" placeholder="Escreva aqui">
                                    <button class="box-sizing">Postar</button>
                                </form>
                            </div>

                            <div style="padding:10px 0;">
                                Seu nome  <strong id="nome-user"></strong> !<br/>
                                <a id="trocar-nome" href="javascript:void(0)">Trocar de nome</a>
                            </div>

                        </div>

                    </div>

                </div>


                <div class="clear box" id="template-conteudo-registro">

                    <div class="box-titulo">Efetue Login ou Cadastre-se</div>

                    <div id="template-conteudo-registro-porque">

                        <div id="template-conteudo-registro-porque-titulo">Quais são as vantagens ?</div>

                        <ul>

                            <li>
                                Lorem ipsum dolor sit amet, eiusmod tempor
                                incididunt ut labore et dolore magna aliqua.
                            </li>

                            <li>
                                Lorem ipsum dolor sit amet, eiusmod tempor
                                incididunt ut labore et dolore magna aliqua.
                            </li>

                            <li>
                                Lorem ipsum dolor sit amet, eiusmod tempor
                                incididunt ut labore et dolore magna aliqua.
                            </li>

                            <li>
                                Lorem ipsum dolor sit amet, eiusmod tempor
                                incididunt ut labore et dolore magna aliqua.
                            </li>

                        </ul>
                    </div>

                    <div id="template-conteudo-registro-cadastro_login">

                        <button id="template-conteudo-registro-cadastro_login-face"/>
                        <button id="template-conteudo-registro-cadastro_login-twitter"/>

                    </div>

                </div>

            </div>

        </div>

    </body>
</html>
