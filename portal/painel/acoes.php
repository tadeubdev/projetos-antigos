<?php

require_once '../config/define.php';
require_once '../class/Conecta.class.php';

extract($_POST);

switch ($acao) {
    
    case 'login':
        $email = mysql_real_escape_string($email);
        $senha = mysql_real_escape_string($senha);
        Conecta::login($email, $senha);
    break;
    
    case 'logout':
        setcookie('i', '', time()-3600);
        echo '<script>location.href="login.php"</script>';
    break;
    
    case 'delete':
        mysql_query("DELETE FROM postagem WHERE id='{$id}'") or die(mysql_error());
    break;
    
    case 'adc-user':
        $sql = mysql_query("SELECT * FROM usuarios WHERE email='{$email}'");
        $linhas = mysql_num_rows($sql);
        
        if($linhas){
            echo "Ja existe este email !";
        } else {
            mysql_query("INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '123') ");
        }
    break;
    
    case 'remover-user':
        mysql_query("DELETE FROM usuarios WHERE email='{$email}'") or die(mysql_error());
    break;
    
    case 'alterar-senha':
        mysql_query("UPDATE usuarios SET senha='{$senha}'  WHERE id='{$_COOKIE['i']}'") or die(mysql_error());
    break;
    
    case 'adc-menu':
        mysql_query("INSERT INTO menu (titulo, link, pai) VALUES ('$titulo', '$link', '$pai') ") or die(mysql_error());
        
        $sql = mysql_query("SELECT * FROM menu ORDER BY id DESC LIMIT 0,1");
        
        $linhas = mysql_num_rows($sql);
        
        if($linhas){
            $key = mysql_fetch_array($sql);
            $key = $key['id'];
        } else {
            $key = 1;
        }
        if($pai){
            echo "<li name=\"$key\"> $titulo | $link <span class=\"template-conteudo-paginas-li-menu-filho-remover\">[remover]</span> </li>";
        } else {
            echo "<li id=\"template-conteudo-paginas-li-menu-pai-$key\" name=\"$key\" class=\"template-conteudo-paginas-li-menu-pai\">
                <span class=\"template-conteudo-paginas-li-menu-pai-remover\">[remover]</span>
                    <div>$titulo </div>
                    <ul>
                        <li class=\"template-conteudo-paginas-li-menu-novo-filho\">
                            <input type=\"text\" placeholder=\"Titulo\" />
                            <input type=\"text\" placeholder=\"Link\" />
                            <button>Adicionar</button>
                        </li>
                    </ul>
            </li>";
        }
        
    break;
    
    case 'remover-menu':
        mysql_query("DELETE FROM menu WHERE id='{$id}' OR pai='{$id}' ") or die(mysql_error());
    break;
    
}