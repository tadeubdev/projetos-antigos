<?php

include 'config/load.php';

if(isset($_GET['user'])){
	$seleciona = $anfitriao = $conta = (object) array();

	$id = escape($_GET['user']);

	$seleciona->user = Banco::query("SELECT * FROM user WHERE id='{$id}'");
	$seleciona->palavra = Banco::query("SELECT * FROM palavra WHERE id_autor='{$id}'");
	$seleciona->oracao = Banco::query("SELECT * FROM oracao WHERE id_autor='{$id}'");

	if(!$seleciona->user->num_rows){ header("Location: index.php"); }

	$anfitriao = $seleciona->user->fetch_object();
	
	$anfitriao->img = (file_exists($anfitriao->img)? $anfitriao->img :'img/user.png');
	$anfitriao->anos = ($anfitriao->anos? "Tenho {$anfitriao->anos} anos" : '');
	
	$anfitriao->site = ($anfitriao->site? "WebSite: <a href=\"{$anfitriao->site}\" title=\"Website\" target=\"_blank\">{$anfitriao->site}</a>" : '');
	$anfitriao->orkut = ($anfitriao->orkut? "Orkut: <a href=\"{$anfitriao->orkut}\" title=\"Orkut\" target=\"_blank\">{$anfitriao->orkut}</a>" : '');
	$anfitriao->site = ($anfitriao->facebook? "FaceBook: <a href=\"{$anfitriao->facebook}\" title=\"Facebook\" target=\"_blank\">{$anfitriao->facebook}</a>" : '');
	
	$conta->palavra = ($seleciona->palavra->num_rows? ($seleciona->palavra->num_rows==1?'Uma palavra' : "{$seleciona->palavra->num_rows} palavras") : 'Sem palavras');
	$conta->oracao = ($seleciona->palavra->num_rows? ($seleciona->palavra->num_rows==1?'Uma palavra' : "{$seleciona->palavra->num_rows} palavras") : 'Sem palavras');

	$anfitriao->palavras = "{$conta->palavra} <br/> {$conta->oracao}";
?>
<img src="<?php echo $img;?>" style="float:left; padding:2px; border:1px solid #CCC; width:150px;" />

    
<div style="float:left; padding-left:10px;">
	<h4 style="text-transform:uppercase;"> <?php echo "{$anfitriao->nome} {$anfitriao->sobrenome}";?> &nbsp;&nbsp; </h4>

	<?php
	echo "<a href=\"editar.php?id={$id}\"><img src=\"img/edit.png\" style=\"width:20px;\" /></a> &nbsp;&nbsp;";

	if($user->adm==1){echo "<a href=\"apagar.php?user={$id}\"><img src=\"img/x.png\" style=\"width:16px;\" /></a>";}		

	echo $anfitriao->login;
	echo $anfitriao->anos;
	echo $anfitriao->site;
	echo "{$anfitriao->facebook} <br/> {$anfitriao->orkut}";
	echo $anfitriao->palavras;
	?>
</div>
<?php } else { sem_login(); } ?>