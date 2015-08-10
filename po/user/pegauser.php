<?php
include'conecta.php';

$result_user = mysql_query("SELECT * FROM user ORDER BY id DESC LIMIT 0,10");

while($row_pega_user = mysql_fetch_array($result_user))
  { 
	$id_pega_user = $row_pega_user['id'];
	$nome_pega_user = $row_pega_user['nome'];
	$sobrenome_pega_user = $row_pega_user['sobrenome'];
	$login_pega_user = $row_pega_user['login'];
	
	if(empty($row_pega_user['img'])){
		$img_pega_user = 'img/user.png';
	} else {$img_pega_user = $row_pega_user['img'];}
	
	if (!file_exists($img_pega_user)) {
    	$img_pega_user = 'img/user.png';
	}
	
	$anos_pega_user = $row_pega_user['idade'];
	if(!empty($anos_pega_user)){$anos_pega_user=$anos_pega_user.' Anos <br />';}else{$anos_pega_user='';}
		
	// Soma o numero de palavras que a pessoa postou
	$result_p = mysql_query("SELECT * FROM palavra WHERE id_autor='{$id_pega_user}'");
	$num_p = mysql_num_rows($result_p);
	if($num_p>=1){if($num_p>1){$pala_num = $num_p.' Palavras';} else {$pala_num = $num_p.' Palavra';}
	} else {$pala_num = 'Nenhuma palavra';} 
	// Soma o numero de palavras que a pessoa postou
	
		
	// Soma o numero de orações que a pessoa postou
	$result_o = mysql_query("SELECT * FROM oracao WHERE id_autor='{$id_pega_user}'");
	$num_o = mysql_num_rows($result_o);
	if($num_o>=1){if($num_o>1){$ora_num = $num_o.'  Pedidos de ora&ccedil;&atilde;o';} else {$ora_num = $num_o.' Pedido de ora&ccedil;&atilde;o';}
	} else {$ora_num = 'Nenhum pedido de ora&ccedil;&atilde;o';} 
	// Soma o numero de orações que a pessoa postou
			
	
	echo '<a href="user.php?user='.$id_pega_user.'" style="text-decoration:none; color:#666; text-transform:none;">
	
	<div class="mostra_user">
	<table>
		<tr>
			<td valign="top"><img src="'.$img_pega_user.'" style="float:left; padding:2px; border:1px solid #CCC; width:65px;" /></td>
			<td valign="top"><small><span style="text-transform:uppercase;">'.
			$nome_pega_user.' '.$sobrenome_pega_user.'</span><hr class="hr" />'
			.$login_pega_user.'<br />'		
			.$anos_pega_user.'
			</td></tr>			
			<tr>
			<td colspan="2" align="center">
			<small><br /><hr class="hr" />'.					
				$pala_num. ' <br />'.
				$ora_num.
			'</small></small>
			</td>
		</tr>
	</table>
	</div>
	
	</a>';

  }
  
echo ' <div style="clear:both;"></div>';


?>