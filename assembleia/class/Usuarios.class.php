<?php

class Usuarios extends Conecta{

    public static $ret;

    public static function start($id) {
        parent::conectar();

        if(Usuarios::exists("usuarios", "cod_user=$id")){
            $retorno = parent::select("usuarios", "cod_user=$id");
            foreach ($retorno as $key => $value) {
                self::$ret[$key] = $value;
            }
            self::$ret['amigos'] = self::amigos($id, "='1'");

            self::$ret['nome'] = sprintf("%s %s", self::$ret['first_name'],self::$ret['last_name']);

            return (object) self::$ret;
        } else {
            header("Location: login.php");
            exit();
        }
    }

    public static function amigos($id, $onde="<>-1"){

        $result = self::select('amigos', "convidou='{$id}' AND aceitou$onde OR recebeu='{$id}' AND aceitou$onde ");

        if( !is_array($result) )
        {
            $result = array( (array) $result );
        }

        $dados = array();

        if( $result && count($result) )
        {

            foreach($result as $row){

                if($row['convidou']==$id){
                    $id_amigo = $row['recebeu'];
                } else {
                    $id_amigo = $row['convidou'];
                }

                if($id<>$id_amigo && self::exists("usuarios", "cod_user=$id_amigo")){
                    $retorno = parent::select("usuarios", "cod_user=$id_amigo");

                    foreach ($retorno as $key => $value) {
                        $dados[$id_amigo][$key] = $value;
                    }

                    $dados[$id_amigo]['aceitou'] = $row['aceitou'];
                }
            }

            shuffle($dados);

        }

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