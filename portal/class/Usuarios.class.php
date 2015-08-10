<?php

include '../config/load.php';

class Usuarios extends Conecta{
    
    public static function start($id) {
        if(Usuarios::exists("usuarios", "cod_user=$id")){
            $retorno = parent::select("usuarios", "cod_user=$id");
            $dados = array();
            foreach ($retorno as $key => $value) {
                $dados[$key] = $value;
            }
            $dados['amigos'] = self::amigos($id, "=1");
            return (object)$dados;
        }
    }
    
    public static function amigos($id, $onde="<>null"){
        $result = mysql_query("SELECT * FROM amigos WHERE convidou='{$id}' AND aceitou$onde OR recebeu='{$id}' AND aceitou$onde ");
        $dados = array();
        
        while($row = mysql_fetch_object($result)){
            $id_amigo = ($row->convidou==$id) ? $row->recebeu : $row->convidou;
            
            if($id<>$id_amigo && self::exists("usuarios", "cod_user=$id_amigo")){
                $retorno = parent::select("usuarios", "cod_user=$id_amigo");
                foreach ($retorno as $key => $value) {$dados[$id_amigo][$key] = $value;}
                $dados[$id_amigo]['aceitou'] = $row->aceitou;
            }
        }
        
        shuffle($dados);
        return (object)$dados;
    }
    
    public static function sao_amigos($id_amigo) {
        foreach(self::$amigos as $int => $key){
            if($int==$id_amigo){
                switch($key['aceitou']){
                    case 0:
                        return 1;
                        break;
                    ///////////////
                    case 1:
                        return 2;
                        break;
                    ///////////////
                    case 2:
                        return 3;
                        break;
                    ///////////////
                    default :
                        return 0;
                        break;
                }
                
                exit();
                
                # Zero = Nao Convidou
                # Um   = Convidou ---> Sem resposta
                # Dois = Convidou ---> Aceito
                # Tres = Convidou ---> Bloqueado
            }
        }
    }
    
    public static function anfitriao($id_anf) {
        if(Usuarios::exists("usuarios", "cod_user=$id_anf")){
            $retorno = parent::select("usuarios", "cod_user=$id_anf");
            $dados = array();
            
            foreach ($retorno as $key => $value) {$dados[$key] = $value;}
            $dados['amigos'] = self::amigos($id_anf, '=1'); 
            
            return (object)$dados;
        }
    }
    
}