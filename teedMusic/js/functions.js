$(function(){
	
	// Rand, identica ao rand(); (PHP)
	function rand(a,b){return Math.floor((Math.random()*b)+a);}

	// sprintf, troca palavras pelo "%s"
	String.prototype.sprintf=function(){var $this=this;for(var x=0;x<=arguments.length-1;x++){$this=$this.replace('%s',arguments[x])}return $this}
	
});