<?php

	require_once 'controller/start.php';

	$user = new User;

	echo $user->verifyExists([

		'email' => 'tadeubarbosa@live.com',

		'password' => '123456'

	]);

	var_dump( $user->selectAll() );