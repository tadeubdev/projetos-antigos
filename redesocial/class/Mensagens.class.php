<?php

class Mensagens{

    public static function amizade($id){

        switch (Usuarios::sao_amigos($id)) {
            case 0:
                echo "Adicione aos Amigos";
                break;
            /////////////////
            case 1:
                echo "Aguarde at&eacute; que voc&ecirc; seja aceito";
                break;
            /////////////////
            case 2:
                echo "Remover Amigo";
                break;
            /////////////////
            case 3:
                echo "Voc&ecirc; n&atilde;o pode adicionar esta pessoa";
                break;
        }

        # Zero = Nao Convidou
        # Um   = Convidou ---> Sem resposta
        # Dois = Convidou ---> Aceito
        # Tres = Convidou ---> Bloqueado
    }

}

?>
