	$( function(){
	$(".input_box").elastic().css("height","30px");
	 
	$(".input_box").focus(function(){
		$(this).filter(function(){
		return $(this).val() == "" || $(this).val() == "Deixe Aqui Seu Pedido de Oracao"
		}).val("").css("color","#000000");
	});
	
	$(".input_box").blur(function(){
		$(this).filter(function(){
		return $(this).val() == ""
		}).val("Deixe Aqui Seu Pedido de Oracao").css("color","#808080");
	});
});