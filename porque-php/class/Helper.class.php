<?php

	class Helper
	{

		public function write($str) { echo "{$str} <br/><hr/><br/>"; }

		public function __call( $meth, $args )
		{

			$action = substr( $meth, 0, 3 );

			$name = substr( $meth, 3, strlen( $meth ) );

			if( $action == 'get' ):

				return isset($this->$name)? $this->$name: null;

			elseif( $action == 'set' ):

				$this->$name = $args[0];

				$this->write( "{$name} is {$args[0]} now..." );

			endif;

		}

	}