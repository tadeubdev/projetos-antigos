<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Dionisio Barbosa</title>
        <?php

            echo "<link rel=\"stylesheet\" href=\"css/estrutura.css\" />
                    <script type=\"text/javascript\" src=\"js/jquery-1.8.3.min.js\"></script>
                    <link rel=\"stylesheet\" href=\"css/jquery-ui.css\" />
                    <script src=\"js/jquery-ui.js\"></script>
                    ";

        ?>
        <script>
        $(function(){
            $("#template-topo-menu a").button();
        });
        </script>
    </head>
<body>
    <!--[if IE]>
        <script src="http://localhost/dionisio/js/jquery.backgroundSize.js"></script>
        <script>$(function(){ $(".bg-cover-ie").css({backgroundSize: "cover"}); });</script>
        <style>.clear{display:inline-block}#template-conteudo-menu{padding:10px 5px;width:20%}#template-conteudo-centro-destaque-conteudo ul li{width:106px}.template-conteudo-centro-anuncios{width:200px!important}</style>
    <![endif]-->
    
    <div id="template">

        <div id="template-topo">

            <div id="template-topo-logo"> Dionisio Barbosa </div>

            <ul class="clear" id="template-topo-menu">
                <li> <?php echo "<a href=\"http://localhost/dionisio/index.php\">Home</a>"?> </li>
            </ul>

        </div>
