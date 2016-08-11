<?php

	$sites = array('sitetadeu.net76.net','ratitoeteed.site90.com','tutoshtml.host22.com');

	if(!isset($_GET)){header("Location: index.php");}

	include 'config/conexao.php';

	$musica = escape($_GET['mus']);

	$seleciona = Banco::query("SELECT * FROM musicas WHERE `key`='{$musica}' ");

	if(!$seleciona->num_rows){
		echo "<script>alert('Esta musica nao existe!'); location.href='./';</script>";
	} else {

		$row = $seleciona->fetch_object();

		$row->formato = explode('.',$row->link);
		$row->formato = end($row->formato);

		$row->link = "m-s/$row->link";

		$row->titulo = "{$row->titulo} - {$row->artista} - {$row->album}.{$row->formato}";

		header("Content-Type: application/save");
		$tam = filesize($row->link);
		header("Content-Length: $tam");
		header("Content-Disposition: attachment; filename=\"{$row->titulo}\"");
		header("Content-Transfer-Encoding: binary");
		header('Expires: 0');
		header('Pragma: no-cache');

		$fp = fopen("$row->link", "r");
		fpassthru($fp);
		fclose($fp);

	}

?>
