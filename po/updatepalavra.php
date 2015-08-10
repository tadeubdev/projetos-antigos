<?php
$valor = $_POST['valor'];
$autor = $_POST['nome'];
$login = $_POST['login'];
$id_autor = $_POST['idlogin'];


if(!empty($valor)){

include'conecta.php';

$autor = $_POST['nome'];
$id_autor = $_POST['idlogin'];

include'data.php';

$posta=mysql_query("INSERT INTO palavra (autor, id_autor, data, login, palavra) VALUES 
('$autor', '$id_autor', '$data', '$login', '$valor')");


$user_pegaid=mysql_query("SELECT * FROM palavra");


while($row_pegaid=mysql_fetch_array($user_pegaid)){
	$id = $row_pegaid['id'];
}

$valor = substr($valor,0,25) . '<br><hr class="hr"><a href="palavra.php?id='.$id.'">Continuar Lendo &raquo;</a><hr class="hr">';
	
	

$sql_pala = mysql_query("SELECT * FROM palavra ORDER BY id DESC");


while($row = mysql_fetch_array($sql_pala)){
	$id = $row['id'];
	$autor = $row['autor'];
	$palavra = $row['palavra'];
	$filtro = array('<font' => '', 'color' => '');
	$palavra = strTr($palavra, $filtro);
	
	$palavra = substr($palavra,0,100) . ' ...  "<br> <font size="1"><a href="palavra.php?id='.$id.'" style=" float:right">[ver]</a></font> <div style="clear:both;"></div>';
			
	$data = $row['data'];
	
	echo '<div class="palavra">
	
	<font color="#0066FF" size="2">por '. $autor . '</font><hr class="hr" />'.
	
	'" '. $palavra . ' <hr class="hr" /><font size="1">
	<br>
	<div style=" clear:both;"></div>
	<br>
	
	'. $data .'
	</font>'.
	
	'</div>';

}

}

?>