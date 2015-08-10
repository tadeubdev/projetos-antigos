<?php

require_once 'config/define.php';

function __autoload($class) {
    $class = "class/$class.class.php";
    include (file_exists($class)? $class: "../$class");
}

Banco::conexao();

require_once 'config/functions.php';

if(@isset($_SERVER['HTTP_REFERER'])) {
    $refer = explode('/',str_replace(array('http://','https://'), '', $_SERVER['HTTP_REFERER']));
    $consulta = Banco::query("SELECT * FROM refer WHERE url='{$_SERVER['HTTP_REFERER']}'");

    // if($consulta->num_rows) {
    //     Banco::query("UPDATE refer SET cont=cont+1 WHERE url='{$_SERVER['HTTP_REFERER']}'");
    // } else {
    //     Banco::query("INSERT INTO refer (site, url) VALUES ('http://{$refer[0]}', '{$_SERVER['HTTP_REFERER']}')");
    // }
}