<?php
	$foto = $_FILES["foto"];
	$fotosize = $_FILES['foto']['size'];
	
	// Se a foto estiver sido selecionada
	if (!empty($foto["name"])) { 
		// Tamanho máximo do arquivo em bytes
		$tamanho = 1000; 
		// Verifica se o tamanho da imagem é maior que o tamanho permitido
		if($foto["size"] > $tamanho) {
   		 	$error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
		}
		
		/*
			// Pega extensão da imagem
			preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext); 
		*/
		
       	// Gera um nome único para a imagem
       	$nome_imagem = $login . ".jpg"; 
        // Caminho de onde ficará a imagem
       	$caminho_imagem = "user/img/" . $nome_imagem; 		
		// Faz o upload da imagem para seu respectivo caminho
		move_uploaded_file($foto["tmp_name"], $caminho_imagem);	
		
			
		include'lib/WideImage.inc.php';	
		
		// Carrega a imagem a ser manipulada
		$imag = wiImage::load($caminho_imagem);
		// Redimensiona a imagem
		$imag = $imag->resize(200, 400);
		// Salva a imagem em um arquivo (novo ou não)
		$imag->saveToFile($caminho_imagem);	
		
		
		
		// Carrega a imagem a ser manipulada
		$imag2 = wiImage::load($caminho_imagem);
		// Redimensiona a imagem
		$imag2 = $imag2->resize(100, 100);
		// Salva a imagem em um arquivo (novo ou não)
		$imag2->saveToFile("user/img/small/" . $login . ".jpg");		
		
		include'conecta.php';
		
		$salva_img = mysql_query("UPDATE user SET img='{$caminho_imagem}' WHERE login='{$login}'");
		header("Location: editar.php{$id}");
		
	}
?>