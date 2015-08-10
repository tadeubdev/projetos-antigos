<?php
	if(!isset($_COOKIE['lg'])){ header("Location: home.php"); }
?>

<div class="box">
	<center>&Uacute;ltimos Usu&aacute;rios</center><hr />
  <?php include'user/pegauser.php'; ?>
</div>



<div class="box_meio">
	<center>Pedidos de Ora&ccedil;&atilde;o</center><hr />
  <?php include'oracao/pegaoracao.php'; ?>
</div>



<div class="box_esquerdo">
	<center>&Uacute;ltimas Palavras</center><hr />
  <?php include'palavra/pegapalavra.php'; ?>
</div>


<div style="clear:both"></div>