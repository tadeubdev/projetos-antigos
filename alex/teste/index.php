<?php include 'config/load.php'; ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script type="text/javascript" src="../js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="../js/cookie.js"></script>
	<link rel="stylesheet" href="css/estrutura.css">
	<script>
	$(function(){

		var box = {
			atual: 0,

			cont: $('.box').size()-1,

			passa: function(n){
				if(!n){
					box.atual = (box.atual==box.cont? 0: box.atual+1);
					n = box.atual;
				} else {
					n = n-1;
					box.atual = n;
				}

				$('.box').hide().eq(n).fadeIn(500);
			}
		};

		$('.passar').click(function(){
			box.passa();
		});

		$('.pular').click(function(){
			box.passa( $(this).attr('name') );
		});

	});
	</script>
</head>
<body>
	
	<div style="background:rgba(0,255,255, .1);" class="clear box-sizing box">
		index

		<?php

			$texto = "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium.";

			echo $texto;

			echo resume($texto);

			function resume($str){
				$str = explode(' ', $str);

				echo var_dump($str);
			}

		?>


		<br/> <a class="passar" href="javascript:void(0)">passar</a>
		<br/> <a class="pular" name="3" href="javascript:void(0)">pula pro terceiro</a>
	</div>

	<div style="background:rgba(25,0,255, .1);" class="clear box-sizing box">
		contato
		<br/> <a class="passar" href="javascript:void(0)">passar</a>
	</div>

	<div style="background:rgba(25,55,0, .1);" class="clear box-sizing box">
		sobre
		<br/> <a class="passar" href="javascript:void(0)">passar</a>
	</div>

</body>
</html>