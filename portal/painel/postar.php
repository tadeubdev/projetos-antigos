<?php

include '../config/define.php';
include '../class/Conecta.class.php';

extract($_POST);

switch ($acao) {
    
    case 'texto':
        $titulo = mysql_real_escape_string($titulo);
        $valor = mysql_real_escape_string($valor);
        $tags = mysql_real_escape_string($tags);
        
        mysql_query("INSERT INTO postagem (titulo, conteudo, tags) VALUES ('{$titulo}', '{$valor}', '{$tags}')");
        break;
    
    case 'editar':
        $valor = mysql_real_escape_string(mysql_real_escape_string(mysql_real_escape_string(mysql_real_escape_string(strip_tags($valor)))));
        
        mysql_query("UPDATE postagem SET titulo='{$titulo}' WHERE id='{$id}'");
        mysql_query("UPDATE postagem SET conteudo='{$valor}' WHERE id='{$id}'");
        break;
    
    case 'video':
        mysql_query("INSERT INTO postagem (video, tags) VALUES ('{$src}', '{$tags}')");
        break;
    
}