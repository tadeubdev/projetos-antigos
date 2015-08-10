$(function(){
	
	// Rand, identica ao rand(); (PHP)
	function rand(a,b){return Math.floor((Math.random()*b)+a);}

	// sprintf, troca palavras pelo "%s"
	String.prototype.sprintf=function(){var $this=this;for(var x=0;x<=arguments.length-1;x++){$this=$this.replace('%s',arguments[x])}return $this}
	
	var data = new Date();
	$('#template-rodape-dados').html("%s:%s<span>%s</span>".sprintf( (data.getHours()<=9?'0':'')+data.getHours(), (data.getMinutes()<=9?'0':'')+data.getMinutes(), (data.getSeconds()<=9?'0':'')+data.getSeconds() ));
	setInterval(function(){
		data = new Date();
		$('#template-rodape-dados').html("%s:%s<span>%s</span>".sprintf( (data.getHours()<=9?'0':'')+data.getHours(), (data.getMinutes()<=9?'0':'')+data.getMinutes(), (data.getSeconds()<=9?'0':'')+data.getSeconds() ));
	},1000);


	var fechaMenu;
	$('#template-rodape-botao, #template-conteudo-menu').mouseover(function(){
		$('#template-conteudo-menu').show();
		$('#template-rodape-botao').css('color','#F80');
		clearInterval(fechaMenu);
	});

	$('#template-rodape-botao,#template-conteudo-menu').mouseout(function(){
		fechaMenu = setInterval(function(){
			$('#template-conteudo-menu').hide();
			$('#template-rodape-botao').css('color','rgba(255,255,255,.1)');
		},150);
	});


	


});