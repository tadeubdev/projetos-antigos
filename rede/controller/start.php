<?php

	require_once 'defines.php';

	function loadClass($class) { require_once "class/{$class}.php"; }

	spl_autoload_register('loadClass');