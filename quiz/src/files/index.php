<?php

	if( !User::logged() ) header( 'Location: usuario/cadastro.php' );

	include 'src/controller/user.php';

	include 'parts/head.php';

	$query = DB::$conn->prepare('SELECT
		questions.id_question
		FROM questions
		RIGHT JOIN reply ON (questions.id_question=reply.question_id)
		WHERE reply.user_id = :id_user ');

	$query->execute([ 'id_user' => $user->id_user ]);

	$query = $query->fetchAll(PDO::FETCH_OBJ);

	$answer = [];

	foreach( $query as $row ) $answer[] = $row->id_question;

	if( count( $answer ) ):

		$query_str = implode(',', array_fill(0, count($answer), '?'));

		$questions = DB::$conn->prepare("SELECT * FROM questions WHERE id_question NOT IN ({$query_str})");

	else:

		$questions = DB::$conn->prepare("SELECT * FROM questions");

	endif;

	$questions->execute( $answer );

	//

	if( isset( $_GET['question'] ) && isset( $_GET['answer'] ) ):

		$question = $_GET['question'];

		$answer = $_GET['answer'];

		//

		$verify = DB::$conn->prepare('SELECT * FROM reply WHERE user_id = :user AND question_id = :question');

		$verify->execute([
			':user' => $user->id_user,
			':question' => $question
		]);

		if( !$verify->rowCount() ):

			$insert = DB::$conn->prepare('INSERT INTO reply (question_id,user_id,answer_id)
				VALUES ( :question, :user, :answer )');

			$insert->execute([
				':question' => $question,
				':user' => $user->id_user,
				':answer' => $answer
			]);

		endif;

		header( 'Location: ' . BASE );

	endif;

?>

	<h2 class="no-margin"> Olá <?php echo ucwords($user->login); ?>! </h2>

	<h2 class="no-margin">

		<small>

			<?php echo $user->points==0? 'Nenhum ponto ainda': ( $user->points==10? '10 pontos': "{$user->points} pontos" ); ?>

		</small>

	</h2>

	<p>

		Você

		<?php echo $questions->rowCount()==0? 'não possui nenhuma pergunta': 'possui '.($questions->rowCount()==1? 'uma pergunta': "{$questions->rowCount()} perguntas"); ?>

		para responder...

	</p>

	<div id="questions">

		<?php

			if( $questions->rowCount() ):

				foreach( $questions->fetchAll(PDO::FETCH_OBJ) as $question ):

					$reply = json_decode($question->reply);

					echo '<div class="questions">',

						"<h3> {$question->question} </h3>",

						( strlen($reply[0]) < 8 ?  '': '<ul>');

						foreach( $reply as $answer_key => $answer ):

							if( strlen($reply[0]) < 8 ):

								echo "<a href=\"?question={$question->id_question}&answer={$answer_key}\">{$answer}</a> &nbsp;";

							else:

								echo "<li> <a href=\"?question={$question->id_question}&answer={$answer_key}\">{$answer}</a> </li>";

							endif;

						endforeach;

					echo ( strlen($reply[0]) < 8 ? '': '</ul>'),

						'</div>';

				endforeach;

			endif;

		?>

	</div>

<?php include 'parts/footer.php'; ?>