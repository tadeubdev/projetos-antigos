<?php

class Usuario {

    public static function login($email,$senha){
        $seleciona = Banco::query("SELECT * FROM usuarios WHERE email='{$email}'");

        if(!$seleciona->num_rows){
            
        }
    }
}