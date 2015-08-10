<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.elastic.js"></script>
<script type="text/javascript" src="js/jquery.faz.js"></script>

<?php 
if(isset($_POST['postar'])){
	
$valor = $_POST['valor'];

if(!empty($valor)){
	
if($valor!='Deixe Aqui Seu Pedido de Oracao'){
include'conecta.php';
$autor = $_POST['nome'];
$login = $_POST['login'];
$id_autor = $_POST['idlogin'];

include'data.php';

$posta=mysql_query("INSERT INTO oracao (autor, id_autor, login, oracao, data) VALUES 
('$autor', '$id_autor', '$login', '$valor', '$data')");
echo mysql_error();

		}
	}
}


if(!empty($_SESSION['login'])){ 
	
	$user_pega_ora=mysql_query("SELECT * FROM user WHERE login='{$login}'");
	$row_pega_ora=mysql_fetch_array($user_pega_ora);
	$nome_pega_ora = $row_pega_ora['nome'];
	$login_pega_ora = $row_pega_ora['login'];
	$id_login_pega_ora = $row_pega_ora['id'];
?>	
		<form action="" method="post">
			<input type="hidden" name="nome" value="<?php echo $nome_pega_ora; ?>" />
       		<input type="hidden" name="login" value="<?php echo $login_pega_ora; ?>" />
       		<input type="hidden" name="idlogin" value="<?php echo $id_login_pega_ora; ?>" />
	        <textarea class="input_box" name="valor" style="text-transform:capitalize; width:98%;" />Deixe Aqui Seu Pedido de Oracao</textarea>
       		 <input type="submit" value="Postar" style="float:right;" name="postar" />
    </form>

<div style="clear:both"></div><br />
<div class="load_status_out"></div>

<?php
}

include'conecta.php';

if(empty($_GET['min']) && empty($_GET['max'])){
	$get_status=mysql_query("SELECT * FROM oracao ORDER BY id DESC LIMIT 0,6") 
	or die (mysql_error($get_status));
} else {
	$min_ = $_GET['min'];	
	$min_ = mysql_real_escape_string($min_);	
	$min_ = preg_replace( '/\\\\/u', '\\\\\\\\', $min_ );
    $min_ = mysql_real_escape_string($min_);
    $min_ = preg_replace( '/([%_])/u', '\\\\$1', $min_ );
	
	if($min!=0){
	$min_--;
	}
	
	$max_ = $_GET['max'];
	$max_ = mysql_real_escape_string($max_);	
	$max_ = preg_replace( '/\\\\/u', '\\\\\\\\', $max_ );
    $max_ = mysql_real_escape_string($max_);
    $max_ = preg_replace( '/([%_])/u', '\\\\$1', $max_ );
	
	$get_status=mysql_query("SELECT * FROM oracao ORDER BY id DESC LIMIT {$min_},{$max_}") 
	or die (mysql_error($get_status));
}


while($row_1_pega_ora=mysql_fetch_array($get_status)){
	
$id_pega_ora = $row_1_pega_ora['id'];

$oracao_pega_ora = $row_1_pega_ora['oracao'];

$palavra = $oracao_pega_ora;
include'substitui.php';
$oracao_pega_ora = $palavra;



$oracao_pega_ora = substr($oracao_pega_ora,0,200) . '...';

$autor_pega_ora = $row_1_pega_ora['autor'];
$id_autor_pega_ora = $row_1_pega_ora['id_autor'];
$ajuda_pega_ora = $row_1_pega_ora['ajuda'];
$data_pega_ora = $row_1_pega_ora['data'];

	
	$get_status_2_pega_ora=mysql_query("SELECT * FROM user WHERE id='{$id_autor_pega_ora}'");
	$row_2_pega_ora=mysql_fetch_array($get_status_2_pega_ora);
	if(empty($row_2_pega_ora['img'])){
		$img_2_pega_ora = 'img/user.png';
	} else {$img_2_pega_ora = $row_2_pega_ora['img'];}
	
	if (!file_exists($img_2_pega_ora)) {
    	$img_2_pega_ora = 'img/user.png';
	}


echo '<div class="load_out">
	
	<div style="float:left; "><img src="'.$img_2_pega_ora.'" class="img_inicio"></div>
		
	<div style="float:left; padding-left:5px; width:74%;">	
		 
		 <span style="float:right;"> 
			 <font size="1">	 
<a href="oracao.php?id='.$id_pega_ora.'" style=" float:right">&raquo; Continuar lendo</a>
			</font>
		 </span>
	 
		<font color="#0066FF" size="2">por '.$autor_pega_ora.'</font><hr class="hr" />
		<font size="2">
			'. $oracao_pega_ora . '
		</font>
		
	</div>
<div style="clear:both"></div>
	
	<div style="float:left; width:100%; margin-top:10px; padding:3px 0; border-top:1px dashed #CCC;">
		<font size="1">	
		'. $data_pega_ora .'
		</font>
	</div>
	
	</div>';
}



$ver_rows = mysql_query("SELECT * FROM oracao");
$num_rows_ver = mysql_num_rows($ver_rows);

if($num_rows_ver>5){
	echo '
<div style="clear:both"></div>
	<br><br><br><br>
	<center>
		<a href="oracao.php">Veja todas as ora&ccedil;&otilde;es</a>
	</center>
	<br><br>
	';
}


if($num_rows_ver>1){

$num_page = $num_rows_ver / 6;
$num_page = number_format($num_page, 0);

$max = $num_rows_ver;
$min = $max - 6;

echo '<br><br>Paginas: ';

for($var=1; $var<=$num_page; $var++){		
	if($max<1){$max = 6;}
	if($max<6){$max = 6;}		
	if($min<1){$min = 0;}
	
	echo ' <a href="index.php?min='.$min.'&max='.$max.'">' . $var . '</a> ';

	if($max>6){
		$max = $max - 6;
	} else {
		$max = 6;
	}
	
	if($min>6){
		$min = $min - 6;
	} else {
		$min = 0;
	}

}

echo '<br /><br /><br />';

if($num_rows_ver>1){
	echo $num_rows_ver . ' ora&ccedil;&otilde;es ';
} else {
	echo $num_rows_ver . ' ora&ccedil;&atilde;o ';
}

}

?>