
	</div>

	<div id="right">

		<?php

			$trends = DB::$conn->prepare('SELECT
				users.login, users.id_user,
				reply.user_id, reply.question_id, reply.answer_id,
				questions.id_question
				FROM users
				INNER JOIN reply ON users.id_user = reply.user_id
				INNER JOIN questions ON reply.question_id = questions.id_question
				WHERE questions.answer = reply.answer_id');

			$trends->execute();

			$array = [];

			$usuarios = [];

			foreach( $trends->fetchAll() as $value ):

				$login = $value['login'];

				if( !isset( $array[ $login ] ) ):

					$array[ $login ] = $value;

					$array[ $login ]['count'] = 0;

				endif;

				$array[ $login ]['count']++;

			endforeach;

			foreach( $array as $value ) $usuarios[] = $value;

			function teste($a, $b)
			{
				$al = $a['count'];
				$bl = $b['count'];
				if ($al == $bl) return 0;
				return ($al < $bl) ? +1 : -1;
			}

			usort( $usuarios, 'teste' );

			$usuarios = array_slice( $usuarios, 0, 5 );

			//

			echo '<h2> Top Five </h2>',

			'<dl>';

			foreach($usuarios as $row):

				echo "<dt> <strong>{$row['login']}</strong> - ". ($row['count']*10) ." pontos </dt>";

			endforeach;

			echo '</dl>';

		?>

	</div>

</body>
</html>