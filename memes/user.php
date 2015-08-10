<?php 
include 'class/Load.class.php'; 

if(empty($_GET['user']) || !$_SESSION['email'])
{
	header("Location: index.php");
}
$email = $_SESSION['email'];
$link = $_GET['user'];
$emailPerfil = dadosQualquer('usuarios','email','link',$link);
?>

<div class="box" style="width: 100%; height: auto;">




<!--	COMEÇA A PARTE CENTRAL DO SITE	-->
<div id="espacoCentral">
	
    <?php		
		if($email == $emailPerfil)
		{
			include 'perfil.php';
		}
		else
		{
			include 'usuarioPagina.php';
		}		
	?>
    
</div>
<!--	TERMINA A PARTE CENTRAL DO SITE	-->




<!--	INCLUI A BARRA LATERAL		-->
    <div id="espacoLateral">
        <?php include 'barraLateral.php'; ?>
    </div>
<!--	INCLUI A BARRA LATERAL		-->


<div class="clear"></div>

</div>

<div class="clear"></div>