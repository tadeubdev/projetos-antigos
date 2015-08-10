<?php

	$img = dadosQualquer('usuarios','img','email',$emailPerfil);
	$nome = dadosQualquer('usuarios','nome','email',$emailPerfil).' '. dadosQualquer('usuarios','sobreNome','email',$emailPerfil);
	$sobre = dadosQualquer('usuarios','sobre','email',$emailPerfil);
	$relacionamento = dadosQualquer('usuarios','relacionamento','email',$emailPerfil);
	$genero = dadosQualquer('usuarios','genero','email',$emailPerfil);
	$escolaridade = dadosQualquer('usuarios','escolaridade','email',$emailPerfil);
	$cidade = dadosQualquer('usuarios','cidade','email',$emailPerfil);
	$estado = dadosQualquer('usuarios','estado','email',$emailPerfil);
	
		function exibePerfil($_titulo, $_meio)
		{
			return '
				<div class="boxPerfil">
					<div class="boxPerfilTitulo">'.$_titulo.'</div>
				
					<div class="boxPerfilCentro"><span>' . $_meio . '<span></div>
				</div>
			';
		}
		
		
		if(!empty($sobre))
		{
			$sobre = exibePerfil('Sobre Mim:',$sobre);
		}
		else
		{
			$sobre = '';
		}
		
		if(!empty($relacionamento))
		{
			$relacionamento =  exibePerfil('Eu estou:','<div style="width:140px; height:50px; background:url(img/'.$relacionamento.'.jpg) no-repeat center; background-size: 100%;"></div>');
		}
		else
		{
			$relacionamento = '';
		}
		
		if(!empty($genero))
		{
			$genero =  exibePerfil('Eu sou do G&ecirc;nero:','<div style="width:140px; height:50px; background:url(img/'.$genero.'.jpg) no-repeat center; background-size: 100%;"></div>');
		}
		else
		{
			$genero = '';
		}
		
		if(!empty($escolaridade))
		{
			$escolaridade =  exibePerfil('Grau de Escolaridade:',$escolaridade);
		}
		else
		{
			$escolaridade = '';
		}
		
		if(!empty($cidade) || !empty($estado))
		{
			$localidade =  exibePerfil('Minha Localiza&ccedil;&atilde;o:','<strong>'.$cidade. ' - ' . $estado . '</strong>');
		}
		else
		{
			$localidade = '';
		}
	
	
	//////////////////
	////////////////////////////
	////////////////////////////////////
	
	echo '<div class="imgUsuario" style="background:url('.$img.') no-repeat center; background-size: 100%; "></div>';
		
	echo '<span style="padding:10px; font-weight:bold; color:#709500">'. $nome .'</span>';
	
	echo '<hr style="margin-top: 5px;">
	
	<a href="javascript:void(0)" id="editarPerfil" style="padding: 10px; font-size: 13px;">Editar Pefil</a>
	
	<div id="mostraSalvar"></div>
	
	';
	
	echo '<div class="clear" style="padding: 10px;"></div>';
?>

<div id="painelMenu">
    <div class="painel" id="perfilEdita" style="color:#AAA; display: none;">Editar</div>
    <div class="painel" id="atividades" style="background:#CCC">Atualiza&ccedil;&otilde;es</div>
    <div class="painel" id="perfil" style="color:#AAA">Perfil</div>
    <div class="painel" id="amigos" style="color:#AAA; ">Amigos</div>
</div>

<div id="painelCentro">


    <div id="atividadesPainel" class="painelMuda" style="padding: 10px;">
    	<?php echo exibeAtividadesPessoa($emailPerfil); ?>
    </div>
    

    <div id="perfilPainel" class="painelMuda" style="display: none;">
    <?php
    	echo $sobre;
		echo $relacionamento;
		echo $genero;
		echo $escolaridade;
		echo $localidade;
    ?>
    </div>
    
    
    

    <div id="perfilEditaPainel" class="painelMuda" style="display: none; padding: 0;">
    <?php
			
		include 'editarPerfilUsuario.php';
		
    ?>
    </div>
    
    

    <div id="amigosPainel" class="painelMuda" style="padding: 5px; display: none;">
		<?php echo perfilAmigos($emailPerfil); ?>
	</div>
    
    
</div>

<div class="clear"></div>


<style>
	#convite
	{
		font-size: 12px;
		padding-right: 20px;
	}
</style>

<script>
	$('.painel').click( function(){
		
		$('.painel').css('background', '#DDD');
		$('.painel').css('color', '#AAA');
		
		$(this).css('background', '#CCC');
		$(this).css('color', '#777');	
		
		var onde = '#' + this.id + 'Painel';
		
		$('.painelMuda').css('display', 'none');
		
		$(onde).css('display', 'block');
	})
</script>

<script type="text/javascript" src="js/reacao.js"></script>