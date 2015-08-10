<?php

	function load($class) { require_once "class/{$class}.class.php"; }

	spl_autoload_register('load');

	//

	$school = new School( 'My School' );

	$school->setDirector( 'Morfels' );

	$school->write( "Actual Director is {$school->getDirector()}" );