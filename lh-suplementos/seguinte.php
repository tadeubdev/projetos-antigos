<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="css/estrutura.css">
	<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
	<style>
	#menu{margin:30px;}
	#menu li{float:left;}
	#menu li span{float:left;display:block;min-width:30px;padding:0 6px; border-radius:5px; height:40px;line-height:40px;text-align:center;font-size:20px; background:#FFF; border:1px solid rgba(0,0,0, .2);color:rgba(0,0,0, .4);cursor:pointer;}
	#menu li div{float:left;width:200px;height:10px;margin-right:-5px;margin-top:15px;background:#CCC}
	
	#menu li div.li-sel{background-image:url('img/imglistrada.jpg') !important;color:rgba(0,0,0,.6) !important;}
	#menu li span.li-sel{background:#CCC !important;color:rgba(0,0,0,.5) !important;}

	#painel{width:900px;min-height:400px;margin:0 auto;}
	#painel li{display:none;}
	#painel li:first-child{display:block;}

	#painel li h2{color:#CCC;}
	#painel li div{padding:10px 0;font-size:15px;}

	.passar{display:block;width:150px;height:40px;line-height:40px;text-decoration:none;text-align:center;background:#DDD;color:#777;margin:0 60px;border:1px solid #CCC;}
	</style>
	<script>
	$(function(){

		$('#menu li:eq(0) div,#menu li:eq(0) span').addClass('li-sel');

		var app = {
			cont: $('#menu li').size()-1,
			atual: 0
		}

		
		$('.passar').click(function(){
			app.atual = (app.atual==app.cont? app.cont: app.atual+1);
			var n = app.atual+1;

			console.log(n);

			$('#menu li span,#menu li div').removeClass('li-sel');

			$('#menu li:lt('+n+') div').addClass('li-sel');
			$('#menu li').eq(n-1).children('span').addClass('li-sel');
			$('#painel li').hide().eq(n-1).show();
		});
		
		$('#menu li span').click(function(){
			var n = Number( $(this).parent().index() )+1;
			app.atual = n;
			
			console.log(n);

			$('#menu li span,#menu li div').removeClass('li-sel');

			$('#menu li:lt('+n+') div').addClass('li-sel');
			$('#menu li').eq(n-1).children('span').addClass('li-sel');
			$('#painel li').hide().eq(n-1).show();
		});

	});
	</script>
</head>
<body>
	
	<ul id="menu" class="clear">
		<li class="clear">
			<div></div>
			<span title="Cadastrese Ou morra">Etapa 1</span>
		</li>

		<li class="clear">
			<div></div>
			<span title="">Etapa 2</span>
		</li>

		<li class="clear">
			<div></div>
			<span title="">Etapa 3</span>
		</li>
	</ul>

	<ul class="clear" id="painel">
		<li>
			<h2>Cadastre-se - Identifique-se</h2>

			<div>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</div>
		<li>
			<h2>Endereço</h2>

			<div>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</div>
		</li>

		<li>
			<h2>...</h2>

			<div>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</div>
		</li>
	</ul>

	<a href="javascript:void(0)" class="passar">passar</a>

</body>
</html>