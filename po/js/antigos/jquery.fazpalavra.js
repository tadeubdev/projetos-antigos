	$( function(){
	$(".input_palavra").elastic().css("height","30px");
	 
	$(".input_palavra").focus(function(){
		$(this).filter(function(){
		return $(this).val() == "" || $(this).val() == "Deixe uma palavra"
		}).val("").css("color","#000000");
	});
	
	$(".input_palavra").blur(function(){
		$(this).filter(function(){
		return $(this).val() == ""
		}).val("Deixe uma palavra").css("color","#808080");
	});
});

	$(document).ready(function() {
		
		$("#postar_palavra").click(function() {
			
			var valor = $(".input_palavra");
			var valorPost = valor.val();
			
			var nome = $("#nome_pega_pala");
			var nomePost = nome.val();
			
			var login = $("#login_pega_ora");
			var loginPost = login.val();
			
			
			var idlogin = $("#id_login_pega_pala");
			var idloginPost = idlogin.val();
			
			
			$.post("updatepalavra.php", {valor: valorPost, nome: nomePost, login: loginPost, idlogin: idloginPost},
			function(data){
			$(".load_palavra_out").html(data);
			}
			, "php");
		});

});