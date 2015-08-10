<?php

	if( $_SERVER['HTTP_HOST'] == 'projetos.dev' ):

		define( 'HOST_NAME', 'localhost' );

		define( 'HOST_USER', 'root' );

		define( 'HOST_PASS', '' );

		define( 'HOST_DB', 'quiz' );

	else:

		define( 'HOST_NAME', 'localhost' );

		define( 'HOST_USER', 'root' );

		define( 'HOST_PASS', '' );

		define( 'HOST_DB', 'quiz' );

	endif;

	///

	if( count( explode( '/', $_SERVER['SCRIPT_NAME'] ) ) > 2 ):

		$scriptFileName = explode( '/', trim( $_SERVER['SCRIPT_NAME'], '/' ) );

		$scriptFileName = current( $scriptFileName );

		$base = 'http://' . sprintf( '%s/%s/', $_SERVER['SERVER_NAME'], $scriptFileName );

	else:

		$base = "http://{$_SERVER['SERVER_NAME']}/";

	endif;

	//

	define( 'BASE', $base );

	define( 'URI', str_replace( 'index.php', '', $_SERVER['SCRIPT_FILENAME'] ) );