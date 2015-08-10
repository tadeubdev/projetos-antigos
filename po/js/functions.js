$(function(){

	$("#cadastra").click(function() {

		var nome = $("#nome_cadastra");
			sobrenome = $("#sobrenome_cadastra"),
			login = $("#login_cadastra"),
			email = $("#email_cadastra"),
			senha = $("#senha_cadastra"),
			senha2 = $("#senha2_cadastra");

		nome_val = $.trim( nome.val() ),
		sobrenome_val = $.trim( sobrenome.val() ),
		login_val = $.trim( login.val() ),
		email_val = $.trim( email.val() ),
		senha_val = $.trim( senha.val() ),
		senha2_val = $.trim( senha2.val() );

		$.post("functions.php", {pr: 'user', nome: nome_val, sobrenome:sobrenome_val, login:login_val, email:email_val, senha:senha_val, senha2:senha2_val},
		function(data){
			$("#resultado").html(data);
		});
	});



	$("#entrar").click(function() {

		var login = $("#login");
		var login_val = login.val();

		var senha = $("#password");
		var senha_val = senha.val();


		$.post("loga.php", {login: login_val, senha: senha_val},
		function(data){
		 	$("#loga").html(data);
		 });
	});

});