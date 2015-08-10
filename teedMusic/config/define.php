<?php

	switch( $_SERVER['SERVER_NAME'] ){
		case 'localhost':
			define("HOST_NAME","localhost");
			define("HOST_USER","root");
			define("HOST_PASS","teed");
			define("HOST_DB","teedmusic");
			break;
		//////////////
		default:
			define("HOST_NAME","mysql8.000webhost.com");
			define("HOST_USER","a2308394_tadeu");
			define("HOST_PASS","4928live");
			define("HOST_DB","a2308394_teste");
			break;
	}

?>