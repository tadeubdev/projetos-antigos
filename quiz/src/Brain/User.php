<?php

	class User
	{

		public static function logged()
		{
			return isset( $_SESSION['user'] );
		}

	}