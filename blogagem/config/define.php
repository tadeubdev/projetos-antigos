<?php

	switch($_SERVER['SERVER_NAME']) {
		case 'localhost':
			const HOST_NAME = 'localhost';
			const HOST_USER = 'root';
			const HOST_PASS = '';
			const HOST_DB = 'banco';
			break;
		/////////

		case '':
			const HOST_NAME = 'localhost';
			const HOST_USER = 'root';
			const HOST_PASS = '';
			const HOST_DB = 'banco';
			break;
		/////////
	}

?>