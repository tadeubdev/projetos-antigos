<?php

	if( !isset( $_SESSION['user'] ) ) header('Location: usuario/logout.php');

	///

	$getUser = DB::$conn->prepare('SELECT * FROM users WHERE login = :login');

	$getUser->execute([ ':login' => $_SESSION['user'] ]);

	if( !$getUser->rowCount() ):

		header('Location: usuario/logout.php');

	endif;

	$user = $getUser->fetch(PDO::FETCH_OBJ);

	$answer = DB::$conn->prepare('SELECT reply.answer_id,questions.answer FROM reply
		INNER JOIN questions ON (reply.question_id=questions.id_question)
		WHERE user_id=:user AND reply.answer_id=questions.answer');

	$answer->execute([ 'user'=>$user->id_user ]);

	$user->points = $answer->rowCount() * 10;