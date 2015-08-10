<?php

include 'load.php';

extract($_POST);

switch($type){
    case 'ver-chat':

        if(!$last) return;

        $sql = Conecta::$conn->query("SELECT * FROM `chat` WHEERE id>$last");

        if($sql && $sql->num_rows){
            while($row=$sql->fetch_object()){
                echo sprintf("<li id=\"%s\"> <strong>[%s] %s</strong> %s </li>", "chat-$row->id", $row->data, $row->nome, $row->conteudo);
            }
        }
        break;
    //////////
    case 'postar-no-chat':
        $chat_data = date('d/m/Y - G:i');
        Conecta::$conn->query("INSERT INTO chat (nome,data,conteudo,time) VALUES
            ('$chat_nome','$chat_data','$chat_conteudo',".time().")");
        break;
    ///////////
}