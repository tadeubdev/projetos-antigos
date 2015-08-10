<?php

	namespace Controller;

	trait Base
	{

		use \Traits\Functions;

		public function __call( $meth, $args )
		{

			$meth = strtolower( substr( $meth, 3, strlen( $meth ) ) );

			self::$data[ $meth ] = $args[0];

			return new self;

		}

		public static function getEmptyData( $name )
		{

			$view = "src/Core/error/empty-data.php";

			self::setData( $name );

			self::setTitle('Ops... Data is empty!');

			self::returnsView( $view );

		}

		public static function getNotFoundClass()
		{

			$view = "src/Core/error/not-found-class.php";

			self::setTitle('Not Found Class');

			self::returnsView( $view );

		}

		public static function getNotFoundFunction()
		{

			$view = "src/Core/error/not-found-function.php";

			self::setTitle('Not Found Function');

			self::returnsView( $view );

		}

		public static function view( $view='index' )
		{

			$view = self::$base .'/'. str_replace( '.', '/', $view);

			$view = "src/Core/views/{$view}.php";

			if( !file_exists($view) ) $view = "src/Core/error/not-found.php";

			self::returnsView( $view );

			return new self;

		}

		public static function returnsView( $view )
		{

			$view = \Files::getFile( $view, null, null, self::$data );

			\Response::json([

				'title' => self::getTitle(),

				'view' => $view

			]);
		}

	}