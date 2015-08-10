<?php

	// Fazer verificação de hacking...

	if(isset($_POST)){
		extract($_POST);

		switch($pr) {

			case 'user':

				// Banco::query(sprintf("INSERT INTO oracao_comen (comentario, login, data, id_oracao) VALUES ('%s', '%s', '%s', '%s')",escape($comentario),$user->id,DATA,$oracao) );

				break;

			#######################

			case 'oracao':

				switch ($type) {
					case 'comentar':
						// valor:'$valor', oracao:'$oracao->id'

						Banco::query(sprintf("INSERT INTO oracao_comen (comentario, login, data, id_oracao) VALUES ('%s', '%s', '%s', '%s')",escape($comentario),$user->id,DATA,$oracao) );

						if(Banco::$conn->error){ echo 'erro'; }
						break;
				}

				break;

		}
	}

?>