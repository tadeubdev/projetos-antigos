<?php

if(!session_start()){session_start();}

if(!$_SESSION){$_SESSION['car']="";}

$session = $_SESSION['car'];

class Car{
    
    public static $arr = array();
    
    public static function adc($nome, $id, $valor, $image){
        
        self::$arr = $_SESSION['car'];
        
        if(@!$_SESSION[$id]){
            self::$arr[$id] = array(
                "nome" => $nome,
                "valor" => $valor,
                "image" => $image
            );
            
            $_SESSION['car'] = self::$arr;
        }
        
    }

}

extract($_POST);

switch ($action) {
    
    case 'echo':
        if(isset($_SESSION['car'])){
            $arr = $_SESSION['car'];
            echo json_encode($arr);
        }        
    break;
    
    case 'adc':
        Car::adc($nome, $id, $valor, $image);
    break;
    
    case 'clear':
        unset($_SESSION['car'][$item]);
        print_r($_SESSION['car']);
    break;
    
}
