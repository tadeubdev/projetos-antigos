<?php
$texto = "Oi, você sabia q fulano é um fdp ?";

$filtro = array('palavrao' => '***', 'outropalavrao' => '***', 'fdp' => '***');

$txt_final = strTr($texto, $filtro);

echo $txt_final;

?>