<?php 

$arquivo=file('arquivo1.txt'); //contem valores de formularios($nome."|".$end..etc)concaten… por "|"

foreach($arquivo as $linha)

// echo $linha."<br>";

$variavel = explode("|",$linha); //função explode

$quantiaArray = count($variavel);

for($x=0; $x<$quantiaArray; $x++)
{
	echo $variavel[$x];
}

?>