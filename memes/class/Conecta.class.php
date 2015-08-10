<?php

class Conecta{
    
    private static $conn;
    private static $sel;
    public static $linhas;
    
    public static function conectar() {
        if(is_null( self::$conn )){
            self::$conn = new PDO( sprintf('mysql:host=%s;username=%s',HOST_NAME,HOST_BD), HOST_USER, HOST_SENHA );
        } 
        return self::$conn;
    }
    
    public static function exists($tabela,$where) {
        $result = mysql_query("SELECT * FROM {$tabela} WHERE $where ");
        return mysql_num_rows($result);
    }
    
    public static function select($tabela,$where='cod_user<>0',$retorno='*') {
        $result = mysql_query("SELECT $retorno FROM {$tabela} WHERE $where ");
        return mysql_fetch_object($result);
    }
    
}

?>