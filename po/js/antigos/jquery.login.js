$(document).ready(function() {
	
	$("#entrar").click(function() {
		
		var login = $("#login");
		var loginPost = login.val();
		
		var senha = $("#senha");
		var senhaPost = senha.val();
		
		$.post("loga.php", {login:loginPost, senha:senhaPost},
		function(data){
		$(".resultado").html(data);
		}
		, "php");
	});
	
});