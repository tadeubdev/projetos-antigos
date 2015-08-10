<style>
.user{padding:2px; border:1px #CCC solid; margin-right:10px;}
.mostra{border:1px solid #CCC; margin:5px 0; padding:4px;}
</style>

<form action="" method="post">
<?php
$dados = (object) array;

// if(isset($_POST['comenta'])){
// 	extract($_POST);
// 	if($valor){
// 		$valor = strip_tags(escape($valor));
// 		$oracao->id = escape($idoracao);
// 		$posta = Banco::query("INSERT INTO oracao_comen (comentario, login, data, id_oracao) VALUES ('{$valor}', '{$user->login}', '{$row->data}', '{$oracao->id}')");
// 	}
// }
// Comentar com jQuery; passar "pri:'oracao',type:'comentar', valor:'$valor', oracao:'$oracao->id'"

$whe = (isset($_GET['id'])? sprintf("WHERE id='%s'",escape($_GET['id'])): 'ORDER BY id DESC');

$dados->oracao = Banco::query("SELECT * FROM oracao {$whe}");

if(!empty($whe)){
	$dados->oracao->id = escape($_GET['id']);
	
	# Dados do user para JS;
	echo "<script>var user=oracao={}; user.id={$user->id},oracao.id={$dados->oracao->id};</script>";

	$dados->oracao->seleciona = Banco::query("SELECT * FROM oracao WHERE id='{$dados->oracao->id}'");
	$dados->oracao->comentarios = Banco::query("SELECT * FROM oracao_comen WHERE id_oracao='{$dados->oracao->id}' ORDER BY id DESC");
	
	$dados->oracao->comentarios->cont = ($dados->comentarios->seleciona->num_rows==0? 'Sem comentários': ($dados->comentarios->seleciona->num_rows==1? 'Um comentário': "{$dados->comentarios->seleciona->num_rows} comentários") );

	while($dados->oracao->row = $dados->oracao->seleciona->fetch_array()){
		$autor = Banco::query("SELECT * FROM user WHERE id='$id_autor'");
		$autor->row = $autor->fetch_array();
		
		$filtro = array('caralho','karalho','porra','puta que pariu','pqp','PQP','filho da puta','FDP','merda','vai tomar no cu','VTNC','vai se foder','viado','puta merda','cacete')
		$dados->oracao->row->palavra = str_ireplace($filtro,'<span style="color:red">*****</span>',$dados->oracao->row->palavra);
		
		$dados->oracao->row->palavra = emoticon($dados->oracao->row->palavra);
	
	####################################

	$comentar = '';

	if(isset($_SESSION['login'])){
		$emoticons = "";
		$emot = array(':)',':o',';)',':s','(h)',':#',':^)','<:o)','|-)',':D',':P',':(',':|',':$',':@','8o|','^o)','+o(','*-)','8-)','(brb)','(L)','(Y)','(N)','(h5)','(yn)');
		
		foreach($emot as $i=>$a){
			$emoticons .= "<a href=\"javascript:void(0)\" id=\"emoticon\" value=\"{$a}\" onclick=\"muda(\" {$a} \");\"><img src=img/emoticon/{$i}.gif></a>";
		}
		
		$comentar = "
			<table style=\"width:100%\">
					<tr>
						<td valign=\"middle\"><input id=\"comenta\" name=\"comenta\" type=\"submit\" value=\"Postar\" /></td>
						<td width=\"90%\">	<center>{$emoticons}</center>  <textarea id=\"valor\" style=\"min-width:100%; height:50px;\" name=\"valor\"></textarea></td>
					</tr>
			</table>
		</form>
		";
	}
	
	if(isset($_SESSION['login']) && $user->adm>=1){
		echo "
			<a href=\"apagar.php?oracao={$id}\"> <img src=\"img/x.png\" style=\"width:13px;\"> </a>	
			<a href=\"editarpost.php?oracao={$id}\" style=\"margin:0 5px;\"><img src=\"img/edit.png\" style=\"width:15px;\"> </a>
		";
	}
	
	echo "
		<strong> by {$autor}</strong> <img src=\"{$autor->row->img}\">
		
		{$row->palavra}

		<font size="1"> {$row->data} </font>
		
		{$oracao->comentarios->cont}

		</div>
		
		{$comentar}
		
		<div class=\"recebe\"></div>
	";
	
	
	while($row_comen = $oracao->comentarios->fetch_array()){
		$id_comen = $row_comen['id'];
		$comentario = $row_comen['comentario'];	
		
		$valor_substitui = $comentario;
		include'emoticon.php';		
		$comentario = $valor_substitui;
		
		$row->palavra = $comentario;
		include'substitui.php';
		$comentario = $row->palavra;
		
		$id_login = $row_comen['login'];
		
		$row->data = $row_comen['data'];
		$oracao->id = $row_comen['id_oracao'];	
		$img_u = '';		
		
		$sql_u = Banco::query("SELECT * FROM user WHERE id='$id_login'");
	while($row_u = mysql_fetch_array($sql_u)){
		$id_u = $row_u['id'];
		$nome_u = $row_u['nome'];
		$sobrenome_u = $row_u['sobrenome'];
		$login_u = $row_u['login'];
		
		if(!empty($row_u['img'])){$img_u = $row_u['img']; 
			$subs = array('img/' => 'img/small/');
			$img_u = strTr($img_u, $subs);
		} else {$img_u = 'img/small/user.png';}
	}
	
		if(!empty($_SESSION['login']) && $adm>0){$apaga = '
		
		<a href="apagar.php?oracao_comentario={$id_comen}" style="float:right;"> <img src="img/x.png" style="width:13px;"> </a>
		
		<a href="editarpost.php?oracao_comentario={$id_comen}" style="float:right; margin:0 5px;"><img src="img/edit.png" style="width:15px;"> </a>
		
		';	} else {$apaga='';}
	
	echo "<div class='mostra'>	
	
	<div style='float:left;'> <a href='user.php?user={$id_u}' title='{$nome_u}' target='_blank'><img src='$img_u' class='user' style='width:80px;' /></a>	</div>	
	
	<div style='float:left; width:80%;'>	$comentario</div>		$apaga
	
	<div class='clear'></div>	
			
	<div style='border-top:1px #CCC dashed; width:100%; margin-top:7px; padding-bottom:2px; padding-top:2px; font-size:10px;'>	by <a href='user.php?user={$id_u}' title='{$nome_u}' target='_blank'>$login_u</a>  -  $row->data	
	</div>
	
	
	<div class='clear'></div>
		</div>
	";
	
	}
	
}

} else {
echo '<center>Ora&ccedil;&otilde;es</center><hr><br>';

$sql_comen = Banco::query("SELECT * FROM oracao ORDER BY id DESC");

$num_comen = mysql_num_rows($sql_comen);

	while($row_comen = mysql_fetch_array($sql_comen)){
		$id_comen = $row_comen['id'];
		$comentario = $row_comen['oracao'];	
		
		$comentario = substr($comentario,0,400) . ' ... <br>';
		
		$valor_substitui = $comentario;
		include'emoticon.php';
		$comentario = $valor_substitui;
		
		$id_login = $row_comen['id_autor'];
		
		$row->data = $row_comen['data'];
		$img_u = '';		
		
	$sql_u = Banco::query("SELECT * FROM user WHERE id='$id_login'");
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
		
		<a href="apagar.php?oracao={$id_comen}" style="float:right;"> <img src="img/x.png" style="width:10px;"> </a>		
		
		<a href="editarpost.php?oracao={$id_comen}" style="margin:0 5px;"><img src="img/edit.png" style="width:16px;"> </a>
		
		';	} else {$apaga='';}
	

	echo "<div class='mostra'>	

	<div style='float:left;'> <a href='user.php?user={$id_u}' title='{$nome_u}' target='_blank'><img src='$img_u' class='user' /></a>	</div>	
	
	$apaga
	
	<div style='float:left; width:80%;'>	$comentario		</div>		
	
	<div class='clear'></div>
	
	
	<small style='margin-left:90px;'><a href='oracao.php?id={$id_comen}'>Continuar Lendo &raquo;</a></small>
	
	<br>
			
	<div style='border-top:1px #CCC dashed; width:100%; margin-top:7px; padding-bottom:2px; padding-top:2px; font-size:10px;'>	by <a href='user.php?user={$id_u}' title='{$nome_u}' target='_blank'>$login_u</a>  -  $row->data	- <span style='float:right;'>#$id_comen</span>	
	</div>
	
	
	<div class='clear'></div>
		</div>
	";

	
}	
}

}
?>

<script>
    function muda(txt){
      var textarea=document.getElementById("valor");
      textarea.value+= ' ' + txt + ' ';
    }
</script>
