<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title> <?php echo isset($title)? $title: 'Quiz'; ?> </title>
	<link rel="stylesheet" type="text/css" href="<?php echo BASE; ?>www/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo BASE; ?>www/css/reset.css">
</head>
<body>

	<header class="clearfix">

		<?php if( User::logged() ): ?>

			<a href="<?php echo BASE; ?>">home</a>

			<a href="<?php echo BASE; ?>usuario">perfil</a>

			<a href="<?php echo BASE; ?>usuario/logout.php" class="right">logout</a>

		<?php else: ?>

			<a href="<?php echo BASE; ?>usuario/login.php">login</a>

			<a href="<?php echo BASE; ?>usuario/cadastro.php">cadastro</a>

		<?php endif; ?>

	</header>

	<div id="left">