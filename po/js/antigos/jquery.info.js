$(document).ready(function() {
	
	$("#pronto").click(function() {
		
		var valor = $(".input_box");
		var valorPost = valor.val();
		
		var nome = $("#nome");
		var nomePost = nome.val();
		
		var login = $("#login");
		var loginPost = login.val();
		
		var idlogin = $("#id_login");
		var idloginPost = idlogin.val();
		
		
		$.post("status_update.php", {valor: valorPost, nome: nomePost, login: loginPost, idlogin: idloginPost},
		function(data){
		$(".load_status_out").html(data);
		}
		, "php");
	});

});