<?php

$ref = explode('/', str_replace(array('http://','https://'),'',$_SERVER['HTTP_REFERER']));

if($ref[0]==$_SERVER['HTTP_HOST']){
    
	if(isset($_POST)){

		require_once 'config/conexao.php';

		extract($_POST);

		switch($type){
			case 'estoque':
                $sql = Banco::query("SELECT * FROM produto WHERE `key`='{$key}'");

                if($sql->num_rows){
                	$row = $sql->fetch_object();
                	echo $row->estoque;
                } else {echo 0;}
				break;
			//////////
		}

	}

} else {
	echo "<script>alert('Acesso Negado!');</script>";
}

?>