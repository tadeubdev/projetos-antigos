<?php

class Conecta{

    public static $conn;
    public static $sel;
    public static $linhas;

    public static function conectar() {
        if(is_null( self::$conn )){
            self::$conn = new mysqli( HOST_NAME, HOST_USER, HOST_SENHA, HOST_BD );
        }
        return self::$conn;
    }

    public static function exists($tabela,$where) {
        $result = self::$conn->query("SELECT * FROM {$tabela} WHERE $where ");
        return $result->num_rows;
    }

    public static function select($tabela,$where='cod_user<>0',$retorno='*') {
        $result = self::$conn->query("SELECT $retorno FROM {$tabela} WHERE $where ");
        return $result->fetch_object();
    }

}