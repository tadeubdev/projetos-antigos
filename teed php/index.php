<?php

	require_once 'vendor/autoload.php';

	(new Input)->start();

	if( Input::get('pageToLoadTemplate') ):

		App::startApplication();

	else:

		include 'src/Core/engine/template.php';

	endif;