<?php
	session_start();
	unset($_SESSION['continua']);
	
	header("Location: index.php");
?>