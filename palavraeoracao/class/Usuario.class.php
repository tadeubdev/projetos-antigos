<?php

class Usuarios extends Conecta{
    
    public static 
        $id, $email, $pass, $first_name, $last_name, $nasc_dia,
        $nasc_mes, $nasc_ano, $cidade, $estado, $relacionamento,
        $status, $perfil, $link, $genero, $img, $amigos;
    
    public static function start($id) {
        parent::conectar();
        
        if(Usuarios::exists("usuarios", "cod_user=$id")){
           $retorno = parent::select("usuarios", "cod_user=$id");
            foreach ($retorno as $key => $value) {
                self::$$key = $value;
            }
            self::$amigos = self::amigos($id, "=1"); 
        } else {
            header("Location: login.php");
            exit();
        }
    }
    
    public static function amigos($id, $onde="<>-1"){
        
        $result = mysql_query("SELECT * FROM amigos WHERE convidou='{$id}' AND aceitou$onde OR recebeu='{$id}' AND aceitou$onde ");
        
        $dados = array();
        
        while($row = mysql_fetch_object($result)){
            
            if($row->convidou==$id){
                $id_amigo = $row->recebeu;
            } else {
                $id_amigo = $row->convidou;
            }
            
            if($id<>$id_amigo && self::exists("usuarios", "cod_user=$id_amigo")){
                $retorno = parent::select("usuarios", "cod_user=$id_amigo");

                foreach ($retorno as $key => $value) {
                    $dados[$id_amigo][$key] = $value;
                }
                
                $dados[$id_amigo]['aceitou'] = $row->aceitou;
            }
        }
        
        shuffle($dados);
        
        return (array) $dados;
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
            
            foreach ($retorno as $key => $value) {
                $dados[$key] = $value;
            }
            
            $dados['amigos'] = self::amigos($id_anf, '=1'); 
            
            return $dados;
            
        } else {
            exit();
        }
    }
    
}