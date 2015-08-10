<?php

	if( isset($_POST['words']))
	{

		$words = substr($_POST['words'], 0, 100);

		$words = urlencode($words);

		$file  = md5($words);

		$file = "audio/{$file}.mp3";

		if (!file_exists($file))
		{
			$mp3 = file_get_contents('http://translate.google.com/translate_tts?tl=pt-br&ie=utf-8&q=' . $words);
			file_put_contents($file, $mp3);
		}

		echo $file;

	}