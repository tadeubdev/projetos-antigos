<?php
    
    include '../config/define.php';
    include '../class/Conecta.class.php';
    
    if(isset($_POST['pronto'])){
        
        $pasta = "../img-posts/";
        
        $tags = $_POST['tags'];
        
        $permitidos = array(".jpg",".jpeg",".gif",".png", ".bmp");

        if(isset($_POST)){
            $nome_imagem    = $_FILES['imagem']['name'];
            $tamanho_imagem = $_FILES['imagem']['size'];
            
            $ext = strtolower(strrchr($nome_imagem,"."));
            
            if(in_array($ext,$permitidos)){

                $tamanho = round($tamanho_imagem / 1024);

                if($tamanho < 1024){
                    $nome_atual = md5(uniqid(time())).$ext;
                    $tmp = $_FILES['imagem']['tmp_name'];

                    if(move_uploaded_file($tmp,$pasta.$nome_atual)){
                        echo "Imagem Enviada";
                        $sql = mysql_query("INSERT INTO postagem (imagem, tags) VALUES ('{$nome_atual}','{$tags}')");
                        
                    }else{
                        echo "Falha ao enviar";
                    }
                }else{
                    echo "A imagem deve ser de no máximo 1MB";
                }
            }else{
                echo "Somente são aceitos arquivos do tipo Imagem";
            }
        }else{
            echo "Selecione uma imagem";
            exit;
        }
        
    }       
?>

<style>
.conteudo-post-button{
    background: #DDD;
    padding: 6px 20px;
    margin: 10px;
    border: 1px solid #CCC;
    border-radius: 5px;
    box-shadow: inset 0 0 20px #CCC;
    cursor: pointer;
}

.conteudo-post-button:active{
    box-shadow: inset 0 0 20px #f9c7c7;
}

#tags{
    width: 200px;
    padding: 4px 10px;
    margin: 10px;
}

#tags:focus{
    outline: none;
}
</style>

<form id="formulario" method="post" enctype="multipart/form-data" action="">
    <input type="file" id="imagem" name="imagem" /> <br/>
    
    <input type="text" id="tags" name="tags" placeholder="Tags separadas por virgula" /> <br/>
    
    <input class="conteudo-post-button" type="submit" name="pronto">
</form>