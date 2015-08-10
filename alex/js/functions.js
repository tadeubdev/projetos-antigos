$(function(){

	// Rand, identica ao rand(); (PHP)
	function rand(a,b){return Math.floor((Math.random()*b)+a);}

	// sprintf, troca palavras pelo "%s"
	String.prototype.sprintf=function(){var $this=this;for(var x=0;x<=arguments.length-1;x++){$this=$this.replace('%s',arguments[x])}return $this}


	$('#alex-topo-menu a').mouseover(function(){
		$(this).css('background-color', 'rgba('+rand(0,255) +','+ rand(0,255) +','+ rand(0,255)+', .7)' );
	});

	$('#alex-topo-menu a').mouseout(function(){
		$(this).css('background-color', '');
	});



	var menu = $('#alex-topo-menu'), menu_top = menu.offset().top;
	setInterval(function(){
		var head_top = $('head').offset().top;
		menu.css({'position':(head_top>menu_top?'fixed':''), 'background-color':(head_top>menu_top?'rgba(0,0,0,.85)':'#3d3d3d') , 'box-shadow':(head_top>menu_top?'0 0 10px rgba(0,0,0,.8)':'') });
	},10);

	(function(a,b,c){
		$('#alex-conteudo-esquerda,#alex-conteudo-centro,#alex-conteudo-direita').height( (a>b? (a>c?a: c): (b>c?b: c)) )
	})($('#alex-conteudo-esquerda').innerHeight(),$('#alex-conteudo-centro').innerHeight(),$('#alex-conteudo-direita').innerHeight());




	var fullscreen = $('#fullscreen');

	fullscreen.img = $('#fullscreen-center-imagem div');
	fullscreen.img.prox = 0;

	fullscreen.img.muda = function(){
		fullscreen.img.prox = (fullscreen.img.prox==(fullscreen.img.length-1)? 0: fullscreen.img.prox+1);
		fullscreen.img.ant = (fullscreen.img.prox==0? (fullscreen.img.length-1): fullscreen.img.prox-1);

		fullscreen.img.hide().eq( fullscreen.img.ant ).show().css('z-index','1');
		fullscreen.img.eq( fullscreen.img.prox ).css('z-index','2').fadeIn(1200);
	}

	setInterval(function(){ fullscreen.img.muda(); },2000);


});