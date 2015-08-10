<?php

class Usuario{
    
    public static $nome;
    public static $senha;
    public static $tipo;
    
    public function __construct( $nome ){
        $sql = Banco::$conn->query("SELECT nome FROM usuarios WHERE nome='{$nome}' ");
        
        if( $sql->num_rows ){
            self::$nome = $nome;

            self::$senha = $sql->fetch_object();
            self::$senha = self::$senha->senha;
            
            return true;
        } else {
            echo "Usuario não existe !!";
            return false;
        }
    }
    
    public function verifica( $senha ){
        if($senha == self::$senha){
            setcookie('nome', self::$nome, time()+(31*24*3600));
            echo "<script>location.href='admin/'</script>";
        } else {
            echo "Senha Incorreta !!";
        }
    }
    
}

?>