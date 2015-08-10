<?php

	session_start();

	//

	$script = str_replace( 'index.php', '', $_SERVER['SCRIPT_NAME'] );

	$uri = $_SERVER['REQUEST_URI'] != $script ? $_SERVER['REQUEST_URI']: 'index.php';

	$uri = str_replace( "?{$_SERVER['QUERY_STRING']}", '', $uri );

	$url = str_replace( $script, '', $uri );

	if( preg_match( '/(.php)/', trim($url,'/') ) < 1 ) $url = trim($url,'/') . '/index.php';

	$file = URI."src/files/{$url}";

	if( !file_exists( $file ) ):

		echo "<h1> Ops! File not exists ... \"{$file}\" </h1>";

		exit();

	endif;

	//

	DB::start();

	//

	require_once $file;