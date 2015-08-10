<?php

	namespace Controller;

	class Home
	{

		use Base;

		public static $base = 'home';

		public static function getHome()
		{

			self::setTitle('Home');

			self::view();

		}

		public static function getImage( $image=null )
		{

			if( !$image ) return self::getEmptyData('image');

			///

			self::setTitle("Image {$image}");

			self::setImage($image);

			self::view('image');

		}

		public static function postImage( $image=null )
		{

			if( !$image ) return;

			\Response::json(['image'=>$image]);

		}

	}