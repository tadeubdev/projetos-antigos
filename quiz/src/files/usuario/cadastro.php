<?php

	if( User::logged() ) header( 'Location: ./' );

	$title = 'Cadastro';

	include URI . 'src/files/parts/head.php';

	if( isset( $_POST['submit'] ) ):

		$login = $_POST['login'];

		$password = $_POST['password'];

		if( empty( $login ) || empty( $password ) ):

			$erro = 'Preencha todos os campos!';

		else:

			$verify = DB::$conn->prepare('SELECT * FROM users WHERE login = :login AND password = :password');

			$verify->execute([

				':login' => $login,

				':password' => $password

			]);

			if( $verify->rowCount() ):

				$erro = 'Usuário já existe!';

			else:

				try
				{

					$insert = DB::$conn->prepare('INSERT INTO users (login,password) VALUES ( :login, :password )');

					$insert->execute([

						':login' => $login,

						':password' => $password

					]);

					//

					$_SESSION['user'] = $login;

					header( 'Location: ../' );

				}
				catch(PDOException $e)
				{
					$erro = $e->getMessage();
				}

			endif;

		endif;

	endif;

?>

	<h2> Olá! Cadastre-se! </h2>

	<a href="login.php"> Já possui uma conta ? </a> <br><br>

	<form action="" method="POST">

		<input type="text" name="login" placeholder="Login" required>

		<input type="password" name="password" placeholder="Senha" required>

		<button name="submit"> Cadastrar </button>

	</form>

	<?php

		if( isset( $erro ) ):

			echo "<div style=\"color:tomato\"> {$erro} </div>";

		endif;

	?>

<?php include URI . 'src/files/parts/footer.php'; ?>