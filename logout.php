<?php session_start(); ?>
<?php

	$_SESSION['tmusername'] = null;
	$_SESSION['tmuser_role'] = null;

	header("Location: index.php");
?>