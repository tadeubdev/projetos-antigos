<style>
	input{width:300px;}
</style>

<?php
$page = 'Informa&ccedil;&otilde;es'; //Nome da pagina para aparecer no titulo
include'header.php'; //Inclui o cabeçalho
include'conecta.php';

	if (!isset($_SESSION)){session_start();}
	if(!empty($_SESSION['login'])){

if(empty($_GET['id'])){
	
		$login = $_SESSION['login'];
	
		$pega = mysql_query("SELECT * FROM user WHERE login='{$login}'");
		
		$row = mysql_fetch_array($pega);
		$id = $row['id'];
		$login = $row['login'];
		$nome = $row['nome'];
		$sobrenome = $row['sobrenome'];
		$email = $row['email'];
		$img_verifica = $row['img'];	
		$site_ver = $row['site'];
		$face_ver = $row['facebook'];
		$orkut_ver = $row['orkut'];
		$idade_ver = $row['idade'];
	
	echo '<center>Ol&aacute; <strong>'.$nome.' '.$sobrenome.'</strong> !</center><hr class="hr" /><br /><br />';
	
	
	if(!empty($_SESSION['continua'])){
		echo 'Precisamos que você nos d&ecirc; algumas informa&ccedil;&otilde;es ...  Caso Queira fazer isso depois, <a href="pula.php" title="Pular">Clique Aqui</a><br /><br />';
	}
	
	
	?>
	<form action="" method="post" enctype='multipart/form-data'>
	
	<table width="100%" height="144" border="0">
		<?php if(empty($_SESSION['continua'])){ ?> 
		<tr>
			<td height="35" align="right" valign="middle"><strong>Nome</strong>:</td>
			<td align="left" valign="middle"><input type="text" style="width:150px; text-transform: capitalize;" value="<?php echo $nome;?>" name="nome" id="nome" /> <input type="text" style="width:150px; text-transform: capitalize;" value="<?php echo $sobrenome;?>" name="sobrenome" id="sobrenome" /></td>
			<td width="35%" rowspan="6" align="center" valign="top">
		<?php 
		$file = 'user/img/'.$login.'.jpg';
		if (file_exists($file)) {
			echo '<img src="'.$file.'" style="padding:2px; border:1px solid #CCC; width:150px;" />';
		} 
		?>    </td>
		</tr>
			
		<tr>
			<td height="35" align="right" valign="middle"><strong>Email</strong>:</td>
			<td align="left" valign="middle"><input type="text" value="<?php echo $email;?>" name="email" id="email" /></td>
		</tr>
		<?php } ?>
	  <tr>
		<td width="21%" height="35" align="right" valign="middle"><strong>Imagem:</strong></td>
		<td width="44%" align="left" valign="middle"><input type="file" name="foto"></td>
		</tr>
	  <tr>
		<td height="35" align="right" valign="middle"><strong>WebSite</strong>:</td>
		<td align="left" valign="middle"><input type="text" value="<?php echo $site_ver;?>" name="site" id="site" /></td>
		</tr>
	  
	  <tr>
		<td height="35" align="right" valign="middle"><strong>FaceBook</strong>:</td>
		<td align="left" valign="middle"><input type="text" value="<?php echo $face_ver;?>" name="face" id="face" /></td>
		</tr>
	  
	  <tr>
		<td height="35" align="right" valign="middle"><strong>Orkut</strong>:</td>
		<td align="left" valign="middle"><input type="text" value="<?php echo $orkut_ver;?>" name="orkut" id="orkut" /> <br> <br>
		</td>
		</tr> 
		
	  <tr>
		<td height="35" colspan="2" align="center" valign="middle"><strong>Quantos anos voc&ecirc; tem </strong>:			   <input style="width:50px!important; text-align:center" name="idade" type="text" id="idade" maxlength="2" value="<?php echo $idade_ver;?>" />
		</td>
		<td height="35" align="center" valign="middle">&nbsp;</td>
	  </tr>   
	   
	 <tr>
		<td colspan="3"><br> <hr></td>
	  </tr>  
	  
	  <tr>
		<td colspan="3" align="center" valign="middle">
		  <input type="submit" name="pronto" style="cursor:pointer; width:100px!important;" value="Pronto" id="pronto" value="Submit">
		</td>
	  </tr>
	</table>
	
	<div id="resultado"></div>
	
	</form>
	
	<?php
	
	if(isset($_POST['pronto'])){
		
		if(isset($_FILES["foto"])){
			include'user/salvaimagem.php';	
		}
		
		$idade = $_POST['idade'];	
		if($idade != is_numeric($idade)){
			$idade=0;
		}
		
		include'conecta.php';
		
		if(!empty($_POST['nome'])){
			$nome = $_POST['nome'];	
			mysql_query("UPDATE  user SET nome='{$nome}' WHERE login='{$login}'");	
		}
		
		if(!empty($_POST['sobrenome'])){
			$sobrenome = $_POST['sobrenome'];
			mysql_query("UPDATE  user SET sobrenome='{$sobrenome}' WHERE login='{$login}'");			
		}	
		
		if(!empty($_POST['email'])){
			$email = $_POST['email'];	
			mysql_query("UPDATE  user SET email='{$email}' WHERE login='{$login}'");	
		}	
		
		if(!empty($_POST['site'])){
			$site = $_POST['site'];	
			mysql_query("UPDATE  user SET site='{$site}' WHERE login='{$login}'");		
		}
		
		if(!empty($_POST['face'])){
			$face = $_POST['face'];	
			mysql_query("UPDATE  user SET facebook='{$face}' WHERE login='{$login}'");		
		}
		
		if(!empty($_POST['orkut'])){
			$orkut = $_POST['orkut'];	
			mysql_query("UPDATE  user SET orkut='{$orkut}' WHERE login='{$login}'");
		}	
		
		$idade = $_POST['idade'];
		mysql_query("UPDATE  user SET idade='{$idade}' WHERE login='{$login}'");
		
		
		unset($_SESSION['continua']);
		header("Location: perfil.php");
		 
	}
	
} else {
	
		$login = $_GET['id'];
	
		$pega = mysql_query("SELECT * FROM user WHERE id='{$login}'");
		
		$row = mysql_fetch_array($pega);
		$id = $row['id'];
		$login = $row['login'];
		$nome = $row['nome'];
		$sobrenome = $row['sobrenome'];
		$email = $row['email'];
		$img_verifica = $row['img'];	
		$site_ver = $row['site'];
		$face_ver = $row['facebook'];
		$orkut_ver = $row['orkut'];
		$idade_ver = $row['idade'];
	
	echo '<center>Ol&aacute; <strong>'.$nome.' '.$sobrenome.'</strong> !</center><hr class="hr" /><br /><br />';
	
	
	if(!empty($_SESSION['continua'])){
		echo 'Precisamos que você nos d&ecirc; algumas informa&ccedil;&otilde;es ...  Caso Queira fazer isso depois, <a href="pula.php" title="Pular">Clique Aqui</a><br /><br />';
	}
	
	
	?>
	<form action="" method="post" enctype='multipart/form-data'>
	
	<table width="100%" height="144" border="0">
		<?php if(empty($_SESSION['continua'])){ ?> 
		<tr>
			<td height="35" align="right" valign="middle"><strong>Nome</strong>:</td>
			<td align="left" valign="middle"><input type="text" style="width:150px; text-transform: capitalize;" value="<?php echo $nome;?>" name="nome" id="nome" /> <input type="text" style="width:150px; text-transform: capitalize;" value="<?php echo $sobrenome;?>" name="sobrenome" id="sobrenome" /></td>
			<td width="35%" rowspan="6" align="center" valign="top">
		<?php 
		$file = 'user/img/'.$login.'.jpg';
		if (file_exists($file)) {
			echo '<img src="'.$file.'" style="padding:2px; border:1px solid #CCC; width:150px;" />';
		} 
		?>    </td>
		</tr>
			
		<tr>
			<td height="35" align="right" valign="middle"><strong>Email</strong>:</td>
			<td align="left" valign="middle"><input type="text" value="<?php echo $email;?>" name="email" id="email" /></td>
		</tr>
		<?php } ?>
	  <tr>
		<td width="21%" height="35" align="right" valign="middle"><strong>Imagem:</strong></td>
		<td width="44%" align="left" valign="middle"><input type="file" name="foto"></td>
		</tr>
	  <tr>
		<td height="35" align="right" valign="middle"><strong>WebSite</strong>:</td>
		<td align="left" valign="middle"><input type="text" value="<?php echo $site_ver;?>" name="site" id="site" /></td>
		</tr>
	  
	  <tr>
		<td height="35" align="right" valign="middle"><strong>FaceBook</strong>:</td>
		<td align="left" valign="middle"><input type="text" value="<?php echo $face_ver;?>" name="face" id="face" /></td>
		</tr>
	  
	  <tr>
		<td height="35" align="right" valign="middle"><strong>Orkut</strong>:</td>
		<td align="left" valign="middle"><input type="text" value="<?php echo $orkut_ver;?>" name="orkut" id="orkut" /> <br> <br>
		</td>
		</tr> 
		
	  <tr>
		<td height="35" colspan="2" align="center" valign="middle"><strong>Quantos anos voc&ecirc; tem </strong>:			   <input style="width:50px!important; text-align:center" name="idade" type="text" id="idade" maxlength="2" value="<?php echo $idade_ver;?>" />
		</td>
		<td height="35" align="center" valign="middle">&nbsp;</td>
	  </tr>   
	   
	 <tr>
		<td colspan="3"><br> <hr></td>
	  </tr>  
	  
	  <tr>
		<td colspan="3" align="center" valign="middle">
		  <input type="submit" name="pronto" style="cursor:pointer; width:100px!important;" value="Pronto" id="pronto" value="Submit">
		</td>
	  </tr>
	</table>
	
	<div id="resultado"></div>
	
	</form>
	
	
	<?php	
	if(isset($_POST['pronto'])){		
		if(isset($_FILES["foto"])){
			include'user/salvaimagem.php';	
		}
		
		$idade = $_POST['idade'];	
		if($idade != is_numeric($idade)){
			$idade=0;
		}		
		$nome = $_POST['nome'];	
		$sobrenome = $_POST['sobrenome'];	
		$email = $_POST['email'];	
		$site = $_POST['site'];	
		$face = $_POST['face'];	
		$orkut = $_POST['orkut'];	
		$idade = $_POST['idade'];
	
		include'conecta.php';		
		mysql_query("UPDATE  user SET nome='{$nome}' WHERE login='{$login}'");	
		mysql_query("UPDATE  user SET sobrenome='{$sobrenome}' WHERE login='{$login}'");	
		mysql_query("UPDATE  user SET email='{$email}' WHERE login='{$login}'");		
		mysql_query("UPDATE  user SET site='{$site}' WHERE login='{$login}'");	
		mysql_query("UPDATE  user SET facebook='{$face}' WHERE login='{$login}'");	
		mysql_query("UPDATE  user SET orkut='{$orkut}' WHERE login='{$login}'");	
		mysql_query("UPDATE  user SET idade='{$idade}' WHERE login='{$login}'");
				
		unset($_SESSION['continua']);
		header("Location: user.php?user={$id}");
		 
	}
	
	
}
	
} else {
	header("Location: perfil.php");
}

?>