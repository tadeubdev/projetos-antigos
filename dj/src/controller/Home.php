<?php

	class Home
	{

		use Controller\Base;

		static $base = 'home';

		//

		static function getHome()
		{

			$host = getHostByName(getHostName());

			pclose(popen("start /B ". App::getSrcDir('library/PHPWebSocket/init.bat'), "r"));

			//

			self::getView()

				->with('title','Home')

				->with('host', sprintf('http://%s/dj/mobile', $host) )

				->with('js',['fancywebsocket','libs/qrcode','libs/angular-qr'])

				->with('css',['home','reader']);

		}

	}