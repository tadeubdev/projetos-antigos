<?php
	
	class Blog {
		public static $nome;
		public static $key;
		public static $usuario;
 		
		private static function novo($key) {
			self::$key = escape($key);
 			
 			$sql = self::$conn->query("SELECT * FROM blog WHERE key='{$key}' ");

 			if($sql->num_rows) {
 				
 				foreach($blog = $sql->fetch_object()){
 					$get = self::$conn->query("SELECT * FROM usuario WHERE key='{$blog->usuario}' ");

 					if($get->num_rows){
	 					self::$nome = $blog->nome;
	 					self::$key = $blog->key;
	 					self::$usuario = $get->fetch_object();
	 					self::$usuario = self::$usuario->id;
 					} else {
						header("Location: erro/blog-apagado.html");
 					}
 				}

 			} else {
 				header("Location: erro/blog-nao-existe.html");
 			}
 	 	}
	}

?>