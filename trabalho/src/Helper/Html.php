<?php

	class Html
	{

		public static $content;

		public static $name;

		public static $attrs = [];

		/**
		 * For uses: Html::span('sample')
		 * @param  str $meth Name of element
		 * @param  str $args Content
		 * @return static item
		 */
		public static function __callStatic( $meth, $args )
		{

			self::$name = $meth;

			self::$content = isset($args[0])? $args[0]: null;

			return new static;
		}

		/**
		 * Get Html::span('sample')->title('My title('My title')
		 * @param  str $meth Name
		 * @param  str $args Arguments
		 * @return static item
		 */
		public function __call( $meth, $args )
		{

			self::$attrs[ $meth ] = $args[0];

			return new static;
		}

		/**
		 * Prints data
		 * @return string
		 */
		public function __toString()
		{

			$attrs = '';

			if( count( self::$attrs ) )
			{

				$attrs = ' ';

				foreach( self::$attrs as $key => $value )
				{
					$attrs .= "{$key}=\"{$value}\" ";
				}

				$attrs = substr( $attrs, 0, strlen( $attrs ) - 1 );
			}

			return sprintf("<%s%s>%s</%s>", self::$name, $attrs, self::$content, self::$name);
		}

	}