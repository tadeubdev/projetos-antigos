<?php

class Banco{
    public static $conn;
    
    public static function start(){
        if(!self::$conn){
            self::$conn = mysqli_connect( HOST_NAME, HOST_USER, HOST_PASS, HOST_DB);
        }
        return self::$conn;
    }
}

?>