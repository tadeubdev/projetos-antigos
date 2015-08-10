<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8"/>
	<title>site</title>
	<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/estrutura.css"/>
	<script>
	$(function(){

		$('input').focus();

		$('body,html').click(function(){ $('input').focus(); });

		$(document).click(function(){ $('input').focus(); });

		var nome = "Tadeu",
			gue = "Teed";

		$(document).bind('keypress',function(e){
			if(e.which==13){
				var val = $('input').val();
				
				if(val.indexOf('alert')>=0){
					var a = val.substring(val.indexOf('alert')+6,val.length),
						b = a.substring(0, val.length).replace(';','');

					alert(b);
					$('input').val('');
					$('ul').prepend( $('<li/>',{html: a.replace(a,'alert '+b+';\n') }) );
				}

				if(val.indexOf('console')>=0){
					var a = val.substring(val.indexOf('console')+8,val.length-4),
						b = a.substring(0, val.length).replace(';','');

					console.log(b);
					$('input').val('');
					$('ul').prepend( $('<li/>',{html: a.replace(a,'console '+b+';\n') }) );
				}

				if(val.indexOf('lutar')>=0){
					var a = val.substring(val.indexOf('lutar')+5,val.length),
						b = $.trim(a.substring(0, val.length).replace(';',''));

					alert(nome +', atacou '+ b);
					$('input').val('');
					$('ul').prepend( $('<li/>',{html: a.replace(a,'lutar '+b+';\n') }) );
				}
			}
		});

	});
	</script>
</head>
<body>

	<input class="box-sizing" placeholder="Insira o codigo aqui..."/>

	<ul></ul>

</body>
</html>