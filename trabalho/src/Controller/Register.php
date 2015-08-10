<?php

	namespace Controller;

	class Register
	{

		use Base;

		public static $base = 'register';

		public static function getRegisterPublic()
		{

			self::setTitle('Register');

			self::view();

		}

		public static function getRegisterPrivated()
		{

			return \Response::redirect('home');

		}

		/////

		public static function getLoginPublic()
		{

			self::setTitle('Login');

			self::view('login');

		}

		public static function getLoginPrivated()
		{

			return \Response::redirect('home');

		}

	}