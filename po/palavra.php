<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.elastic.js"></script>
<style>
.user{padding:2px; border:1px #CCC solid; margin-right:10px;}

.mostra{border:1px solid #CCC; margin:5px 0; padding:4px;}

.clear{clear:both}
</style>

<form action="" method="post">
<?php 
	$page = 'Palavra'; //Nome da pagina para aparecer no titulo
	include'header.php'; //Inclui o cabeçalho
	include'conecta.php';
	
	if(isset($_POST['comenta'])){
		
	$valor = $_POST['valor'];
	echo 'dd';
	if(!empty($valor)){
		
		include'conecta.php';
		
		$idpalavra = $_POST['idpala'];		
		$idlogin = $_POST['idlogin'];
	
		include'data.php';
	
	$posta=mysql_query("INSERT INTO palavra_comen (comentario, id_login, data, id_palavra) VALUES 
	('$valor', '$idlogin', '$data', '$idpalavra')");
	echo mysql_error();
	
		}
	}
	
if(!empty($_GET['id'])){ 

	$id_pega = $_GET['id'];
		
	$id_pega = mysql_real_escape_string($id_pega);	
	$id_pega = preg_replace( '/\\\\/u', '\\\\\\\\', $id_pega );
    $id_pega = mysql_real_escape_string($id_pega);
    $id_pega = preg_replace( '/([%_])/u', '\\\\$1', $id_pega );
	
	if(!empty($_SESSION['login'])){
		$user=mysql_query("SELECT * FROM user WHERE login='{$login}'");
		while($row_user=mysql_fetch_array($user)){
				$id_login = $row_user['id'];
				echo '<input type="hidden" name="idlogin" value="'.$id_login.'" />';
			}
	}
	
	echo '<input type="hidden" name="idpala" id="idpala" value="'.$id_pega.'" />';
	
$sql = mysql_query("SELECT * FROM palavra WHERE id='{$id_pega}'");

$sql_comen_ver = mysql_query("SELECT * FROM palavra_comen WHERE id_palavra='$id_pega' ORDER BY id DESC ");
$numero_comentarios = mysql_num_rows($sql_comen_ver);
if($numero_comentarios==0){$numero_comentarios = 'Nenhum Coment&aacute;rio';} else
if($numero_comentarios==1){$numero_comentarios = 'Um coment&aacute;rio';} else
if($numero_comentarios>1){$numero_comentarios = $numero_comentarios . ' coment&aacute;rios';}


while($row = mysql_fetch_array($sql)){
	$id = $row['id'];
	$autor = $row['autor'];
	$palavra = $row['palavra'];
	

	$valor_substitui = $palavra;
	include'emoticon.php';		
	$palavra = $valor_substitui;
	
	$gostei = $row['gostei'];
	$naogostei = $row['naogostei'];
		
	$data = $row['data'];
	
	if(!empty($_SESSION['login'])){
		
			
	$emoticons = "	
<a href='javascript:void(0)' id='emoticon' value=':)' onclick='muda(\" :) \");'><img src=img/emoticon/1.gif></a>	
<a href='javascript:void(0)' id='emoticon' value=':o' onclick='muda(\" :O \");'><img src=img/emoticon/2.gif></a>	
<a href='javascript:void(0)' id='emoticon' value=';)' onclick='muda(\" ;) \");'><img src=img/emoticon/3.gif></a>
<a href='javascript:void(0)' id='emoticon' value=':s' onclick='muda(\" :s \");'><img src=img/emoticon/4.gif></a>		
<a href='javascript:void(0)' id='emoticon' value='(h)' onclick='muda(\" (h) \");'><img src=img/emoticon/5.gif></a>		
<a href='javascript:void(0)' id='emoticon' value=':#' onclick='muda(\" :# \");'><img src=img/emoticon/6.gif></a>				
<a href='javascript:void(0)' id='emoticon' value=':^)' onclick='muda(\" :^) \");'><img src=img/emoticon/8.gif></a>		
<a href='javascript:void(0)' id='emoticon' value='<:o)' onclick='muda(\" <:o) \");'><img src=img/emoticon/9.gif></a>		
<a href='javascript:void(0)' id='emoticon' value='|-)' onclick='muda(\" |-) \");'><img src=img/emoticon/10.gif></a>		
<a href='javascript:void(0)' id='emoticon' value=':D' onclick='muda(\" :D \");'><img src=img/emoticon/11.gif></a>		
<a href='javascript:void(0)' id='emoticon' value=':P' onclick='muda(\" :P \");'><img src=img/emoticon/12.gif></a>		
<a href='javascript:void(0)' id='emoticon' value=':(' onclick='muda(\" :( \");'><img src=img/emoticon/13.gif></a>		
<a href='javascript:void(0)' id='emoticon' value=':|' onclick='muda(\" :| \");'><img src=img/emoticon/14.gif></a>		
<a href='javascript:void(0)' id='emoticon' value=':$' onclick='muda(\" :$ \");'><img src=img/emoticon/15.gif></a>		
<a href='javascript:void(0)' id='emoticon' value=':@' onclick='muda(\" :@ \");'><img src=img/emoticon/16.gif></a>		
<a href='javascript:void(0)' id='emoticon' value='8o|' onclick='muda(\" 8o| \");'><img src=img/emoticon/17.gif></a>		
<a href='javascript:void(0)' id='emoticon' value='^o)' onclick='muda(\" ^o) \");'><img src=img/emoticon/18.gif></a>		
<a href='javascript:void(0)' id='emoticon' value='+o(' onclick='muda(\" +o( \");'><img src=img/emoticon/19.gif></a>		
<a href='javascript:void(0)' id='emoticon' value='*-)' onclick='muda(\" *-) \");'><img src=img/emoticon/20.gif></a>		
<a href='javascript:void(0)' id='emoticon' value='8-)' onclick='muda(\" 8-) \");'><img src=img/emoticon/21.gif></a>		
<a href='javascript:void(0)' id='emoticon' value='(brb)' onclick='muda(\" (brb) \");'><img src=img/emoticon/22.gif></a>		
<a href='javascript:void(0)' id='emoticon' value='(L)' onclick='muda(\" (L) \");'><img src=img/emoticon/23.gif></a>		
<a href='javascript:void(0)' id='emoticon' value='(Y)' onclick='muda(\" (Y) \");'><img src=img/emoticon/24.gif></a>		
<a href='javascript:void(0)' id='emoticon' value='(N)' onclick='muda(\" (N) \");'><img src=img/emoticon/25.gif></a>		
<a href='javascript:void(0)' id='emoticon' value='(h5)' onclick='muda(\" (h5) \");'><img src=img/emoticon/26.gif></a>		
<a href='javascript:void(0)' id='emoticon' value='(yn)' onclick='muda(\" (yn) \");'><img src=img/emoticon/27.gif></a>";
	
	
	$comentar = '
		<table style="width:100%">
				<tr>
					<td valign="middle"><input name="comenta" type="submit" value="Postar" /></td>
					<td width="90%">	<center>'.$emoticons.'</center>  <textarea name="valor" id="valor" style="min-width:100%; height:50px;"></textarea></td>
				</tr>
		</table>
		</form>
		';
	} else {$comentar='';}
	
	if(!empty($_SESSION['login']) && $adm==1){
		echo '		
		<a href="apagar.php?palavra='.$id.'"> <img src="img/x.png" style="width:15px;"> </a>		
		
		<a href="editarpost.php?palavra='.$id.'" style="margin:0 5px;"><img src="img/edit.png" style="width:15px;"> </a>
		';
	}
	
	echo '<strong> by '	. $autor . '</strong>
	<hr class="hr" /><br><br>'.
	
	$palavra . ' <br><br><br>
	<font size="1">'. $data .' 
	</font> 
	
	<hr class="hr" />
	<div style=" clear:both;"></div>
	 
	<div style="background:#333; padding:5px; color:#999;">	
		'.$numero_comentarios.'  
	</div>
		'. $comentar .'
	<br>	
		
	<div class="recebe"></div>
	';
	
$sql_comen = mysql_query("SELECT * FROM palavra_comen WHERE id_palavra='$id_pega' ORDER BY id DESC ");

$num_comen = mysql_num_rows($sql_comen);

	while($row_comen = mysql_fetch_array($sql_comen)){
		$id_comen = $row_comen['id'];
		$comentario = $row_comen['comentario'];	
		
		$valor_substitui = $comentario;
			include'emoticon.php';
		$comentario = $valor_substitui;
				
		$id_login = $row_comen['id_login'];
		$data = $row_comen['data'];
		$id_palavra = $row_comen['id_palavra'];	
		$img_u = '';		
		
	$sql_u = mysql_query("SELECT * FROM user WHERE id='$id_login'");
	while($row_u = mysql_fetch_array($sql_u)){
		$id_u = $row_u['id'];
		$nome_u = $row_u['nome'];
		$sobrenome_u = $row_u['sobrenome'];
		$login_u = $row_u['login'];
		$nome_u = $row_u['nome'];	
		
		if(!empty($row_u['img'])){$img_u = $row_u['img']; 
			$subs = array('img/' => 'img/small/');
			$img_u = strTr($img_u, $subs);
		} else {$img_u = 'img/small/user.png';}
	}
	
	if(!empty($_SESSION['login']) && $adm==1){$apaga = '
	
	<a href="apagar.php?palavra_comentario='.$id_comen.'" style="float:right;"> <img src="img/x.png" style="width:15px;"> </a>
	
		<a href="editarpost.php?palavra_comentario='.$id_comen.'" style="margin:0 5px;"><img src="img/edit.png" style="width:15px;"> </a>
	
	';	} else {$apaga='';}
	
	echo "<div class='mostra'>
	
	<div style='float:left;'> <a href='user.php?user={$id_u}' title='{$nome_u}' target='_blank'><img src='$img_u' class='user' /></a>	</div>	
	<div style='float:left; width:80%;'>	$comentario</div>		$apaga
	<div class='clear'></div>			
	<div style='border-top:1px #CCC dashed; width:100%; margin-top:7px; padding-bottom:2px; padding-top:2px; font-size:10px;'>	by <a href='user.php?user={$id_u}' title='{$nome_u}' target='_blank'>$login_u</a>  -  $data
	</div>
	
	<div class='clear'></div>
		</div>
	";
	
	
	
	
	
	}
	
}

} else {
echo '<center>Palavras</center><hr><br>';

$sql_comen = mysql_query("SELECT * FROM palavra ORDER BY id DESC");

$num_comen = mysql_num_rows($sql_comen);

	while($row_comen = mysql_fetch_array($sql_comen)){
		$id_comen = $row_comen['id'];
		$comentario = $row_comen['palavra'];	
		
		$comentario = substr($comentario,0,400) . ' ... <br>';
		
		$valor_substitui = $comentario;
		include'emoticon.php';
		$comentario = $valor_substitui;
		
		$id_login = $row_comen['id_autor'];
		
		$data = $row_comen['data'];
		$img_u = '';		
		
	$sql_u = mysql_query("SELECT * FROM user WHERE id='$id_login'");
	while($row_u = mysql_fetch_array($sql_u)){
		$id_u = $row_u['id'];
		$nome_u = $row_u['nome'];
		$sobrenome_u = $row_u['sobrenome'];
		$login_u = $row_u['login'];
		$nome_u = $row_u['nome'];	
		
		if(!empty($row_u['img'])){$img_u = $row_u['img']; 
			$subs = array('img/' => 'img/small/');
			$img_u = strTr($img_u, $subs);
		} else {$img_u = 'img/small/user.png';}
	
		if(!empty($_SESSION['login']) && $adm==1){$apaga = '
		
		<a href="apagar.php?oracao='.$id_comen.'" style="float:right;"> <img src="img/x.png" style="width:15px;"> </a>		
		
		<a href="editarpost.php?oracao='.$id_comen.'" style="margin:0 5px;"><img src="img/edit.png" style="width:15px;"> </a>
		
		';	} else {$apaga='';}
	

	echo "<div class='mostra'>	

	<div style='float:left;'> <a href='user.php?user={$id_u}' title='{$nome_u}' target='_blank'><img src='$img_u' class='user' /></a>	</div>	
	
	$apaga
	
	<div style='float:left; width:80%;'>	$comentario		</div>		
	
	<div class='clear'></div>
	
	
	<small style='margin-left:90px;'><a href='palavra.php?id={$id_comen}'>Continuar Lendo &raquo;</a></small>
	
	<br>
			
	<div style='border-top:1px #CCC dashed; width:100%; margin-top:7px; padding-bottom:2px; padding-top:2px; font-size:10px;'>	by <a href='user.php?user={$id_u}' title='{$nome_u}' target='_blank'>$login_u</a>  -  $data	- <span style='float:right;'>#$id_comen</span>	
	</div>
	
	
	<div class='clear'></div>
		</div>
	";

	
}	
}

}


?>


<script>
$(document).ready(function() {	
		$("#curti").click(function() {			
			var id_pala = $("#idpala");
			var id_palaPost = id_pala.val();			
			$.post("gostei.php", {id_pala:id_palaPost},
			function(data){
			$("#reacao").html(data);
			}
			, "php");
		});
	 	
		$("#naocurti").click(function() {			
			var id_pala = $("#idpala");
			var id_palaPost = id_pala.val();			
			$.post("naogostei.php", {id_pala:id_palaPost},
			function(data){
			$("#reacao").html(data);
			}
			, "php");
		});	

});

    function muda(txt){
      var textarea=document.getElementById("valor");
      textarea.value+= ' ' + txt + ' ';
    }

</script>
