<!DOCTYPE html>
<html>
<head>
	<script type='text/javascript' src='js/jquery-1.8.3.min.js'></script>
	<script>
	$(function(){
		
	});	
	</script>
	<style>
	*{
		font-family: tahoma;
		font-size: 12px;
	}

	ul{
		list-style: none;
	}
	
	li{
		padding: 10px;
		border-bottom: 1px dotted #CCC;
	}
	
	.clear:after{
		content: ".";
		height: 0;
		overflow: hidden;
		visibility: hidden;
		display: block;
		clear: both;
	}
	
	div{
		float: left;
		margin: 2px;
		background-color: #CCC;
		background-size: cover;
		background-repeat: no-repeat;
		border: 1px solid #999;
		box-shadow: 0 15px 25px -15px #000;
	}

	li:first-letter{
		margin-top: 10px;
		font-size: 20px;
		font-family: arial black;
		font-weight: bold;
		text-transform: capitalize;
		padding: 3px;
	}
	</style>
</head>
<body>
	
	<?php
		
		class post{
			
			public static function text($txt){
				echo "<li> txt $txt </li>";
			}
			
			public static function img($img){
				
				if(!is_array($img)){
					echo "<li class='clear'> <div style='background-image:url(\"$img\"); width:400px; height:400px;'></div>  </li>";
				} else {
					
					$conta_img = count($img);
					
					echo "<li class='clear'>";
					
					switch($conta_img){
						
						case 2:
							for($x=0; $x<$conta_img; $x++){
								echo "<div style='background-image:url(\"$img[$x]\"); width:198px; height:198px;'></div>";
							}
							break;
						
						case 3:
							for($x=0; $x<$conta_img; $x++){
								echo "<div style='background-image:url(\"$img[$x]\"); width:131px; height:131px;'></div>";
							}
							break;
						
					}
					
					echo "</li>";
					
				}
			}
			
			public static function video(){}
			
		}
		
		echo "<ul>";
		
		post::text('tadeu etc');
		
		post::img('img.png');
		
		post::img(['img.png','img.png']);
		
		post::img(['img.png','img.png','img.png']);
		
		post::img(['img.png','img.png','img.png','img.png']);
		
		echo "</ul>";
		
	?>
	
</body>
</html>