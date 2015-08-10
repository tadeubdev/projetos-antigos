<?php

if(isset($_POST['valor'])){

extract($_POST);

include 'config/conexao.php';

$key = md5(uniqid());

$posta = Banco::query("INSERT INTO palavra_comen (comentario,id_login,data,id_palavra,key) VALUES ('{$comentario}', '{$use->login}', '{$data}', '{$id_palavra}', '{$key}')");

$seleciona = Banco::query("SELECT * FROM palavra_comen WHERE `key`=''{$key}");

$row = $seleciona->fetch_object();

################################################

$result = mysql_query("SELECT * FROM user WHERE `id`='{$row->id_login}'");

$user = $result->fetch_object()){
$user->nome = "{$user->nome} {$user->sobrenome}";
$user->img = $user->img||'img/user.png';

echo "<br>
	<table width='100%' style='border-bottom:1px dashed #666; font-size:13px'>
		<tr>
			<td width='6%' valign='top'>
	        	<div class='user' style='background:url({$row->img});'></div>
	        </td> 
	        
			<td width='94%' valign='top'>{$row->comentario}</td>
		</tr>
		<tr>
			<td></td>
			<td>{$row->data}</td>
		</tr>
	</table>
";

}

?>