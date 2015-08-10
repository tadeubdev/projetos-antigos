<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.elastic.js"></script>
<script type="text/javascript" src="js/jquery.fazpalavra.js"></script>

<?php if(!empty($login)){ 

$user_pega_pala=mysql_query("SELECT * FROM user WHERE login='{$login}'");
while($row_pega_pala=mysql_fetch_array($user_pega_pala)){
	$nome_pega_pala = $row_pega_pala['nome'];
	$login_pega_pala = $row_pega_pala['login'];
	$id_login_pega_pala = $row_pega_pala['id'];


echo '
	<input type="hidden" id="nome_pega_pala" value="'.$nome_pega_pala.'" />
	<input type="hidden" id="login_pega_pala" value="'.$login_pega_pala.'" />
	<input type="hidden" id="id_login_pega_pala" value="'.$id_login_pega_pala.'" />';
	
}
?>

<textarea class="input_palavra" style=" width:98%;" />Deixe uma palavra</textarea>
<input type="button" value="Postar" style=" float:right;" id="postar_palavra" />

<div style="clear:both"></div><br />
<div class="load_palavra_out"></div>


<?php 
} 

$sql_pala = mysql_query("SELECT * FROM palavra ORDER BY id DESC");

while($row = mysql_fetch_array($sql_pala)){
	$id = $row['id'];
	$autor = $row['autor'];
	$palavra = $row['palavra'];
	$filtro = array('<font' => '');
	$palavra = strTr($palavra, $filtro);
	
	$palavra = substr($palavra,0,120) . ' ...  "';
	
	$data = $row['data'];
	
	echo '<div class="palavra">
	
	<font color="#0066FF" size="2">por '. $autor . '</font>
	
	 <span style="float:right;">
	 
	 <font size="1">
	 
	 <a href="palavra.php?id='.$id.'" style=" float:right">&raquo; Continuar lendo</a></font> <div style="clear:both;"></div>
	 
	 </span>
		
	<hr class="hr" />'.
	
	'" '. $palavra . ' <hr class="hr" />
	
	<font size="1">
	<div style=" clear:both;"></div>
	
	'. $data .'
	</font>'.
	
	'</div>';
}

?>