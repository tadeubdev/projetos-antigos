<?php

	switch( $_SERVER['SERVER_NAME'] ){
		case 'localhost':
			define("HOST_NAME","localhost");
			define("HOST_USER","root");
			define("HOST_PASS","");
			define("HOST_DB","alex");
			break;
		//////////////
		default:
			break;
	}

?>