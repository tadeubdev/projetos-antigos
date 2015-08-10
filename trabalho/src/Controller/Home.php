<?php

	namespace Controller;

	class Home
	{

		use Base;

		public static $base = 'home';

		public static function getHomePublic()
		{

			return \Response::redirect('register');

		}

		public static function getHomePrivated()
		{

			self::setTitle('Home');

			self::view();

		}

		//if( !$image ) return self::getEmptyData('image');
		//\Response::json(['image'=>$image]);

	}