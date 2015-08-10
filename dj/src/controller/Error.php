<?php

	class Error
	{

		use Controller\Base;

		public static $base = 'error';

		//

		public static function getFileNotFound( $pagina=null )
		{

			self::getView('not-found-class')

					->with('title','Erro')

					->with('css','error')

					->with('menu',['Algo deu errado!'])

					->with('pagina',$pagina);

		}

		public static function getControllerNotFound()
		{

			self::getView('not-found-function')

					->with('title','Erro')

					->with('css','error')

					->with('menu',['Algo deu errado!'])

					->with('pagina',$pagina);
		}

		public static function getMethodNotFound()
		{

			self::getView('not-found-class')

					->with('title','Erro')

					->with('css','error')

					->with('menu',['Algo deu errado!'])

					->with('pagina',$pagina);
		}

	}