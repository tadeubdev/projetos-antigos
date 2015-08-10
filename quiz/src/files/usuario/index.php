<?php

	if( !User::logged() ) header( 'Location: ./cadastro.php' );

	include 'src/controller/user.php';

	$answer = DB::$conn->prepare('SELECT reply.answer_id,
		questions.answer,questions.question,questions.reply FROM reply
		INNER JOIN questions ON (reply.question_id=questions.id_question)
		WHERE user_id=:user
		ORDER BY id_reply DESC');

	$answer->execute([ 'user' => $user->id_user ]);

	//

	$title = "Usuário: " . ucwords($user->login);

	include URI . 'src/files/parts/head.php';

?>

	<h2 class="no-margin">

		Olá <?php echo ucwords($user->login); ?>!

	</h2>

	<?php

		if( $answer->rowCount() ):

			echo '<h2 class="no-margin">'.

				'<small>'.

					($user->points==0? 'Nenhum ponto ainda': ( $user->points==10? '10 pontos': "{$user->points} pontos" )),

				'</small>'.

			'</h2>';

			echo "<ul id=\"answer\">";

			foreach( $answer->fetchAll(PDO::FETCH_OBJ) as $row ):

				$row->reply = json_decode( $row->reply );

				echo "<li class=\"answer ". ($row->answer==$row->answer_id? 'correct' : 'incorrect') ."\">",

						"<h4> {$row->question} </h4>",

						"<div>",

							"<strong>Sua resposta:</strong> {$row->reply[ $row->answer_id ]}",

						"</div>",

					"</li>";

			endforeach;

			echo "</ul>";

		else: ?>

			<h2> Você ainda não respondeu a nenhuma pergunta ... </h2>

			<a href="./"> Vá para a página inicial! </a>

		<?php endif; ?>

<?php include URI . 'src/files/parts/footer.php'; ?>