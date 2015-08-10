<?php

	class Response
	{

		public static function json( $array )
		{
			echo json_encode($array);
		}

		public static function jscript( $str )
		{
			self::json(['view'=>"<script>{$str}</script>"]);
		}

		public static function redirect( $str )
		{
			return self::jscript("location.hash='{$str}';");
		}

	}