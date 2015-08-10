<?php

	class School extends Helper
	{

		public $data;

		public function __construct( $name )
		{
			$this->write("New school: {$name}");
		}

	}