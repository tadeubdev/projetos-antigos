<?php

$ref = explode('/', str_replace(array('http://','https://'),'',$_SERVER['HTTP_REFERER']));

if($ref[0]==$_SERVER['HTTP_HOST']){
    
    class Car {
        
        public static $arr = array();
        
        public static function tratar($url) {
            $url = preg_replace('~[^\\pL0-9_]+~u', '-', $url);
            $url = trim($url, "-");
            $url = iconv("utf-8", "us-ascii//TRANSLIT", $url);
            $url = strtolower($url);
            $url = preg_replace('~[^-a-z0-9_]+~', '', $url);
            return $url;
        }
        
        public static function adc($nome, $id, $valor, $image, $dados){
            
            if(!$_COOKIE || !isset($_COOKIE)){setcookie('car', '', time()+3600);}
            
            @self::$arr = (array) json_decode($_COOKIE['car']);
            
            $link = sprintf("produto/$id-%s.html",urlencode(self::tratar($nome)));
            
            self::$arr[$id] = array(
                "nome" => $nome,
                "link" => $link,
                "valor" => $valor,
                "image" => $image,
                "dados" => $dados
            );
            
            self::$arr = json_encode(self::$arr);
            
            setcookie('car', self::$arr, time() + (1 * 24 * 36000));
            
            echo json_encode(array(
                "id" => $id,
                "nome" => $nome,
                "link" => $link,
                "valor" => $valor,
                "image" => $image,
                "dados" => $dados
            ));
        }

    }

    extract($_POST);
    
    switch ($action) {
        
        case 'echo':
            if(isset($_COOKIE['car'])){echo $_COOKIE['car'];}
        break;
        
        case 'adc':
            Car::adc($nome, $id, $valor, $image, $dados);
        break;
        
        case 'clear':        
            $resp = (array) json_decode($_COOKIE['car']);
            $new = array();
            foreach($resp as $int=>$obj){

                if($int != $item){
                    $new[$int] = array(
                        "nome"  => $obj->nome,
                        "link"  => $obj->link,
                        "valor" => $obj->valor,
                        "image" => $obj->image,
                        "dados" => $obj->dados
                    );
                }
            }
            setcookie('car', json_encode($new), time() + (1 *24*36000));
        break;

        case 'clear-all':
            setcookie('car', '', time()+3600);
        break;

    }

} else {
    echo "<script>alert('Acesso Negado!');</script>";
}

?>