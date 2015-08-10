<?php

	class Url
	{

		public static function addHttpIntoUrl( $url )
		{
			return preg_match( '/(http)/', $url )? $url: "http://{$url}";
		}

		public static function toLocalUrl( $url )
		{
			return $url;
		}

		public static function toExternalUrl( $url )
		{
			return self::addHttpIntoUrl( $url );
		}

	}