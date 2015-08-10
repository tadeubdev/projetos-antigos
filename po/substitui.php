<?php
$filtro = array('caralho' => '*****', 'karalho' => '*****', 'porra' => '*****', 'puta que pariu' => '*****', 'pqp' => '*****', 'PQP' => '*****', 'filho da puta' => '*****', 
'FDP' => '*****', 'merda' => '*****', 'vai tomar no cu' => '*****', 'VTNC' => '*****', 'vai se foder' => '*****', 'viado' => '*****', 'puta merda' => '*****', 'cacete' => '*****');

$palavra = strTr($palavra, $filtro);

$filtro_palavra = array('*****' => '<span style="color:red">*****</span>');
$palavra = strTr($palavra, $filtro_palavra);


?>