<?php
// Flag que indica se a erro ou nÃ£o
$erro = null;
// Quando enviado o formulÃ¡rio
if (isset($_FILES['arquivo']))
{
    // Config
    $extensoes = array(".jpg",".jpeg",".png",".gif",".bmp");
    $caminho = "uploads/";
    // Recuperando informacoes do arquivo
    $nome = $_FILES['arquivo']['name'];
    $temp = $_FILES['arquivo']['tmp_name'];
    // Verifica se a extensÃ£o Ã© permitida
    if (!in_array(strtolower(strrchr($nome, ".")), $extensoes)) {
            $erro = 'Extensao invalida';
    }
    // Se nÃ£o houver erro
    if (!$erro) {
        // Gerando um nome aleatÃ³rio para a imagem
        $nomeAleatorio = md5(uniqid(time())) . strrchr($nome, ".");
        // Movendo arquivo para servidor
        if (!move_uploaded_file($temp, $caminho . $nomeAleatorio)){
            $erro = 'Nao foi possivel anexar o arquivo';
        }
    }
}
?>

    <script type="text/javascript" src="js/jquery.js"></script>
    
    <script type="text/javascript">
    $(function($) {
        // Definindo pÃ¡gina pai
        var pai = window.parent.document;
        
        <?php if (isset($erro)): // Se houver algum erro ?>
        
            // Exibimos o erro
            alert('<?php echo $erro ?>');
            
        <?php elseif (isset($nome)): // Se nÃ£o houver erro e o arquivo foi enviado ?>
        
            // Adicionamos um item na lista (ul) que tem ID igual a "anexos"
            $('#anexos', pai).append('<li lang="<?php echo $nomeAleatorio ?>"><?php echo $nome ?> <img src="image/remove.png" alt="Remover" class="remover" onclick="removeAnexo(this)" \/> </li>');
            
        <?php endif ?>
        
        // Quando enviado o arquivo
    	$("#arquivo").change(function() {	    
            // Se o arquivo foi selecionado
            if (this.value != "")
            {    
                // Exibimos o loder
                $("#status").show();
                // Enviamos o formulÃ¡rio
                $("#upload").submit();
            }
        });
    });
    </script>
</head>
<form id="upload" action="upload.php" method="post" enctype="multipart/form-data">
    
    <label>Arquivo: </label> <span id="status" style="display: none;"><img src="image/loader.gif" alt="Enviando..." /></span> <br />
    <input type="file" name="arquivo" id="arquivo" />
        
</form>