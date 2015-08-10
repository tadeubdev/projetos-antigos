<?php

	class DB
	{

		public static $conn;

		public static function start()
		{
			if (!isset(self::$conn)):

				self::$conn = new PDO( sprintf( 'mysql:host=%s;dbname=%s', HOST_NAME, HOST_DB ), HOST_USER, HOST_PASS, [ PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8" ]);

				self::$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				self::$conn->setAttribute( PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING );

			endif;

			return self::$conn;

		}

	}