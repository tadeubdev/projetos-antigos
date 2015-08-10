<?php

	Input::start( $_GET, $_POST );

	App::setVariables();

	Site::setAllData( Files::getData('website.php') );

	require_once App::getSrcDir('routes.php');

	App::initTemplateRouting();
