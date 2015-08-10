<?php

	class String
	{

		public static function toSlug( $str )
		{
			$str = iconv('utf-8', 'us-ascii//TRANSLIT', $str);
			return strtolower( preg_replace( '/[^A-Za-z0-9-]+/', '-', $str ) );
		}

		public static function toText( $str )
		{
			return ucwords( str_replace( '-', ' ', $str ) );
		}

		public static function emptyOrNull( $str, $isNull=null )
		{
			return isset( $str ) && !is_null( $str )? $str: $isNull;
		}

		public static function getFirstExplodeString( $delm, $string )
		{
			return explode( $delm, $string )[0];
		}

		public static function getEndExplodeString( $delm, $array )
		{
			$array = explode( $delm, $array );

			return end( $array );
		}

		public static function removeItemOfArray( $index, $array )
		{

			$response = [];

			foreach( $array as $key => $value ):

				if( $key !== $index ):

					if( is_numeric( $index ) ):

						$response[] = $value;

					else:

						$response[ $key ] = $value;

					endif;

				endif;

			endforeach;

			return $response;
		}

		public static function countExplode( $delm, $array )
		{
			$array = explode( $delm, $array );

			return count( $array );
		}

	}