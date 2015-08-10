<?php

	return [

		'production' => [

			'match' => 'teedphp.com.br',

			'database' => [

				'name' => '123.45.67',

				'user' => 'TeedPhp',

				'pass' => '123456',

				'db' => 'teed_php'

			],

			'debug' => false,

			'compress_output' => true,

		],

		'local' => [

			'match' => '*',

			'database' => [

				'name' => 'localhost',

				'user' => 'root',

				'pass' => '',

				'db' => 'membresia'

			],

			'debug' => true,

			'compress_output' => true,

		],

	];