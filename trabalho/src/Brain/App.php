<?php

	class App
	{

		public static function startApplication()
		{

			$method = 'get';

			if( Input::get('action') ):

				$method = Input::get('action');

				unset( $_POST['action'] );

			endif;

			//

			$page = Input::get('pageToLoadTemplate');

			unset($_POST['pageToLoadTemplate']);

			//

			if( empty($page) || $page == '/' ) $page = 'home';

			$page = str_replace( ' ', '-', strtolower( $page ) );

			$page = preg_replace( '/[´`^~\'"]/', null, iconv( 'UTF-8', 'ASCII//TRANSLIT', $page ) );

			//

			$controller_name = ucfirst( String::getFirstExplodeString( '/', $page ) );

			//

			$function = String::getEndExplodeString( '/', $page );

			if( !$function ) $function = 'home';

			$function = str_replace( ' ', '', ucwords( str_replace( '/', ' ', $function ) ) );

			$function = "{$method}{$function}";

			//

			$controller = new stdClass;

			$controller->class = "\\Controller\\{$controller_name}";

			$controller->function = $function;

			if( method_exists( $controller->class, "{$controller->function}Public" )
				|| method_exists( $controller->class, "{$controller->function}Privated" ) ):

				$controller->function .= Auth::logged()? 'Privated': 'Public';

			endif;

			if( method_exists( $controller->class, "{$controller->function}Admin" ) && Auth::isAdmin() ):

				$controller->function .= 'Admin';

			endif;

			if( !class_exists( $controller->class ) ):

				$controller->class = "\\Controller\\Base";

				$controller->function = 'getNotFoundClass';

			endif;

			if( !method_exists( $controller->class, $controller->function ) ):

				$controller->function = 'getNotFoundFunction';

			endif;

			Input::set( 'class', $controller_name );

			Input::set( 'function', $function );

			call_user_func_array( "{$controller->class}::{$controller->function}", $_POST );

		}

	}