<?php

switch( $_SERVER['SERVER_NAME'] ){
	case 'localhost':
		define("HOST_NAME","localhost");
		define("HOST_USER","root");
		define("HOST_PASS","teed");
		define("HOST_DB","alex");
		break;
	/////////////////
	default:
		define("HOST_NAME","");
		define("HOST_USER","");
		define("HOST_PASS","");
		define("HOST_DB","");
		break;
}