<?php

	class Auth
	{

		public static function logged()
		{
			return isset( $_SESSION['user'] );
		}

		public static function isAdmin()
		{
			if( !self::logged()) return false;

			return true;
		}

	}