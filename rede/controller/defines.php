<?php

	if( $_SERVER['SERVER_NAME'] == 'projetos.dev' ):

		define( 'HOST_NAME', 'localhost' );

		define( 'HOST_USER', 'root' );

		define( 'HOST_PASS', '' );

		define( 'HOST_DB', 'rede' );

	else:

		define( 'HOST_NAME', '' );

	endif;