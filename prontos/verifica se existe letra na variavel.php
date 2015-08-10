<?php

$palavra = '/(casa)/';
$frase = 'Eu fui casa pra ontem!';

if (preg_match($palavra, $frase)) {
    echo "A palavra 'casa' foi encontrada na frase <br>";
} else {
    echo "A palavra 'casa' não foi encontrada na frase";
}

?>