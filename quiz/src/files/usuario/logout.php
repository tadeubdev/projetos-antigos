<?php

	unset( $_SESSION['user'] );

	header( 'Location: '. BASE . 'usuario/login.php' );