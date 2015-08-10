$(document).ready(function() {
	
	$("#cadastra").click(function() {
		
		var nome = $("#nome_cadastra");
		var nomePost = nome.val();
		
		var sobrenome = $("#sobrenome_cadastra");
		var sobrenomePost = sobrenome.val();
		
		var login = $("#login_cadastra");
		var loginPost = login.val();
		
		var email = $("#email_cadastra");
		var emailPost = email.val();
		
		var senha = $("#senha_cadastra");
		var senhaPost = senha.val();
		
		var senha2 = $("#senha2_cadastra");
		var senha2Post = senha2.val();	
			
		
		$.post("cadastra.php", {nome: nomePost, sobrenome: sobrenomePost, login: loginPost, email: emailPost, senha: senhaPost, senha2: senha2Post},
		function(data){
		 $("#resultado").html(data);
		 }
		 , "php");
	});
	
	
	
	$("#entrar").click(function() {
		
		var login = $("#login");
		var loginPost = login.val();
		
		var senha = $("#password");
		var senhaPost = senha.val();
			
		
		$.post("loga.php", {login: loginPost, senha: senhaPost},
		function(data){
		 $("#loga").html(data);
		 }
		 , "php");
	});
	
});
