<script type="text/javascript" src="js/jquery.js"></script>

<style type="text/css">
iframe {
    border: 0;
    overflow: hidden;
    margin: 0;
    height: 60px;
    width: 450px;
}

#anexos {
    list-style-image: url(image/file.png);
}

img.remover {
    cursor: pointer;
    vertical-align: bottom;
}
</style>


<script type="text/javascript">
$(function($) {
    // Quando enviado o formulÃ¡rio
    $("#upload").submit(function() {
        // Passando por cada anexo
        $("#anexos").find("li").each(function() {
            // Recuperando nome do arquivo
            var arquivo = $(this).attr('lang');
            // Criando campo oculto com o nome do arquivo
            $("#upload").prepend('<input type="hidden" name="anexos[]" value="' + arquivo + '" \/>');
        }); 
    });
});
    
// FunÃ§Ã£o para remover um anexo
function removeAnexo(obj)
{
    // Recuperando nome do arquivo
    var arquivo = $(obj).parent('li').attr('lang');
    // Removendo arquivo do servidor
    $.post("index.php", {acao: 'removeAnexo', arquivo: arquivo}, function() {
        // Removendo elemento da pÃ¡gina
        $(obj).parent('li').remove();
    });
}
    </script>
    
</head>

<body>

<ul id="anexos"></ul>

<iframe src="upload.php" frameborder="0" scrolling="no"></iframe>

<form id="upload" action="post.php" method="post">
    <input type="submit" name="enviar" value="Enviar" />
</form>

</body>
</html>