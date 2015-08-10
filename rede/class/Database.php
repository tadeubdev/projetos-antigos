<?php

	class Database
	{

		public $conn;

		public $data = [];

		public function __construct()
		{
			if( is_null( $this->conn ) ):

				$this->conn = new PDO( sprintf('mysql:host=%s;dbname=%s', HOST_NAME, HOST_DB), HOST_USER, HOST_PASS );

				$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				$this->conn->setAttribute( PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING );

			endif;

			return $this->conn;
		}

		public function __set( $meth, $args )
		{
			$this->data[$meth] = $args;
		}

		public function save()
		{

			if( empty( $this->data ) ) return;

			$this->insert( $this->data );
		}

		public function prepare( $str )
		{
			return $this->conn->prepare( $str );
		}

		public function insert( $insertData )
		{

			$cols = implode( ',', array_keys( $insertData ) );

			///

			if( isset( $insertData['password'] ) ) $insertData['password'] = sha1( $insertData['password'] );

			$data = array_values( $insertData );

			///

			$values = str_repeat( '?,', count( $insertData ) );

			$values = substr( $values, 0, strlen( $values ) - 1 );

			$insert = $this->prepare("INSERT INTO {$this->table} ({$cols}) VALUES ({$values})");

			$insert->execute( $data );
		}

		public function delete( $data )
		{

			$cols = $this->returnsParamToWhere( $data );

			///

			if( isset( $data['password'] ) ) $data['password'] = sha1( $data['password'] );

			$values = array_values( $data );

			///

			$delete = $this->prepare("DELETE FROM {$this->table} WHERE {$cols}");

			$delete->execute( $values );
		}

		public function selectAll()
		{
			$select = $this->prepare("SELECT * FROM {$this->table}");

			$select->execute();

			return $select->fetchAll( PDO::FETCH_OBJ );
		}

		public function verifyExists( $data )
		{

			$cols = $this->returnsParamToWhere( $data );

			///

			if( isset( $data['password'] ) ) $data['password'] = sha1( $data['password'] );

			$values = array_values( $data );

			///

			$select = $this->prepare("SELECT * FROM {$this->table} WHERE {$cols}");

			$select->execute( $values );

			return $select->rowCount();
		}

		public function returnsParamToWhere( $data )
		{

			$cols = [];

			foreach( array_keys( $data ) as $a ):

				$cols[] = "{$a} = ?";

			endforeach;

			return implode( ' AND ', $cols );
		}

	}