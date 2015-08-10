<?php

require_once 'config/config.php';

extract($_POST);

switch ( $function_Action ){
    
    case'insert':
        $arr = serialize( $function_array );
        
        Banco::$conn->query("INSERT INTO pixel (user, conteudo) VALUES ('1', '$arr')");
    break;
    
    case'get':
        $sql = Banco::$conn->query("SELECT * FROM pixel ORDER BY id DESC");
        $r = array();

        while( $row=$sql->fetch_array() ){ $r[]= unserialize($row['conteudo']); }

        echo json_encode( $r );
    break;
}

?>