<?php
	
	$abre = (object)array();

	$abre->programas = glob('programas/*');
	$programas = array();
	if($abre->programas){
		foreach($abre->programas as $nome){ $programas[] = utf8_encode($nome); }
		$programas = sprintf("programas = %s;", json_encode($programas));
	}

	$abre->backs = glob('backs/*');
	$backs = array();
	if($abre->backs){
		foreach($abre->backs as $nome){ $backs[] = utf8_encode($nome); }
	}
?>
<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="js/functions.js"></script>
	<link rel="stylesheet" href="css/estrutura.css">
	<script>
	$(function(){

		var aplicacao = {},
			programas;
		
		<?php if($programas){ echo $programas; } ?>

		if(programas){
			for(var p in programas){
				var prog = {},
					conta = $('.template-conteudo-painel:last div').size();

				prog.nome = programas[p].replace('programas/','').replace('.php','');
				prog.link = programas[p];

				if(conta>7){
					$('#template-conteudo-painel').append( $('<div/>', {class:'template-conteudo-painel'}) );
				}

				$('.template-conteudo-painel:last').append(
					$('<div/>', {programa:prog.nome, html:prog.nome.substring(0,1), class:'template-conteudo-painel-icone'}).addClass('box-sizing')
					.append( $('<div/>', {html: prog.nome, class:'template-conteudo-painel-icone-nome'}).addClass('box-sizing') )
				);
			}
		}

		aplicacao.telas = ['loadding','template'];

		aplicacao.abre = function(n){
			$('#'+ this.telas[n]).show();
		}

		aplicacao.abre( 1 );

		$('#template-conteudo-programas-topo-links-minimizar').click(function(){
			$('#template-conteudo-programas').fadeOut();
			$('#template-rodape-menu div').removeClass('sel');
		});


		$('.template-conteudo-painel-icone').click(function(){
			var nome = $(this).attr('programa');

			if($('iframe[nome="'+nome+'"]').size()<=0){
				$('#template-conteudo-programas').append( $('<iframe/>', {nome:nome, src:('programas/'+nome+'.php')}) );
				
				$('#template-rodape-menu').append(
					$('<div/>', {html:nome, programa:nome})
				);
			}

			$('#template-conteudo-programas').show().children('iframe').hide();
			$('iframe[nome="'+nome+'"]').show();
			$('#template-rodape-menu div').removeClass('sel');
			$('#template-rodape-menu div[programa="'+nome+'"]').addClass('sel');
			$('#template-conteudo-programas-topo-titulo').html( nome );
		});

		$('#template-rodape-menu div').live('click',function(){
			var nome = $(this).attr('programa');
			
			$('#template-conteudo-programas').show().children('iframe').hide();
			$('iframe[nome="'+nome+'"]').show();
			$('#template-rodape-menu div').removeClass('sel');
			$('#template-rodape-menu div[programa="'+nome+'"]').addClass('sel');
			$('#template-conteudo-programas-topo-titulo').html( nome );
		});

	});
	</script>
</head>
<body>
	
	<div class="clear box-sizing" id="loadding">
		<div id="loadding-logo"> teed<span>Panel</span> </div>
		
		<div class="clear box-sizing" id="loadding-inputs">
			<input class="box-sizing" type="text" placeholder="Login">
			<input class="box-sizing" type="password" placeholder="Senha">
			<button class="box-sizing">Entrar</button>
		</div>

	</div>

	<div style="background-image:url('<?php echo $backs[0];?>');" class="box-sizing clear" id="template">
		
		<div class="clear box-sizing" id="template-conteudo">
			<div class="clear box-sizing" id="template-conteudo-painel">
				<div class="clear template-conteudo-painel"></div>
			</div>
			
			<div class="clear box-sizing" id="template-conteudo-programas">
				<div class="box-sizing" id="template-conteudo-programas-topo">
					<div class="box-sizing" id="template-conteudo-programas-topo-titulo"></div>

					<div class="box-sizing" id="template-conteudo-programas-topo-links">
						<span id="template-conteudo-programas-topo-links-fechar">fechar</span>
						<span id="template-conteudo-programas-topo-links-minimizar">minimizar</span>
					</div>
				</div>
			</div>
			
			<div class="clear box-sizing" id="template-conteudo-menu">
				ddddd
			</div>
		</div>

		<div class="clear box-sizing" id="template-rodape">
			<div class="box-sizing" id="template-rodape-botao">T</div>
			
			<div class="box-sizing clear" id="template-rodape-menu">
				<div id="template-rodape-menu-outros" programa="outros"> outros ^
					<div class="box-sizing" id="template-rodape-menu-outros-painel"></div>
				</div>
			</div>

			<div class="box-sizing" id="template-rodape-dados"></div>
		</div>

	</div>

</body>
</html>