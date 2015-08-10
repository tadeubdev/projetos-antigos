<?php

class Carrinho {
    
    public static $item;
    public static $carrinho;
    
    public static function start() {
        if(!isset($_COOKIE['carrinho']) || !$_COOKIE['carrinho']){setcookie('carrinho',  json_encode(array()), time()+(31*24*3600));}
    }
    
    public static function verifica() {
        if($_COOKIE['carrinho']=='[]'){return false;} else {return true;}
    }
    
    public static function add($id,$nome,$img,$preco) {
        self::$item = (array) json_decode($_COOKIE['carrinho']);
        
        @self::$item[$id] = array(
            'nome'=>$nome,
            'img'=>$img,
            'preco'=>$preco
        );
        
        setcookie('carrinho', json_encode(self::$item), time()+(31*24*3600));
    }
    
    public static function get($item='') {
        self::$carrinho = null;
        
        foreach((array) json_decode($_COOKIE['carrinho']) as $int=>$val){
            self::$carrinho->$int = (object)array('nome'=>$val->nome, 'img'=>$val->img, 'preco'=>$val->preco);
        }
        
        if($item){return (object)self::$carrinho->$item;} else {return (object)self::$carrinho;}
    }
    
    public static function remover($id) {
        self::$item = (object) json_decode($_COOKIE['carrinho']);
        
        if(@count(self::$item->$id)){
            unset(self::$item->$id);
            setcookie('carrinho', json_encode((array)self::$item), time()+(31*24*3600));
        } else {return false;}
    }
    
    public static function clear() {
        setcookie('carrinho',json_encode(array()),time()-(31*24*3600));
    }
}