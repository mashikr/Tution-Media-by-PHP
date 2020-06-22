<?php ob_start(); ?>
<?php session_start(); ?>
<?php include "../db.php" ?>
<?php
if(!isset($_SESSION['tmuser_role'])){
	header("Location: ../index.php");
}
elseif($_SESSION['tmuser_role'] == 'teacher'){
		header("Location: ../index.php");
	}
	$set_profile = mysqli_query($connection, "SELECT `status` FROM {$_SESSION['tmuser_role']} WHERE `username`='{$_SESSION['tmusername']}'");
	while($row = mysqli_fetch_array($set_profile)){
		$status = $row['status'];
	}
	if($status == 'unset'){
		header("Location: set_profile.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="shortcut icon" type="image/x-icon" href="../img/icon.png">
  <link rel="stylesheet" href="../css/all.css">
  <link rel="stylesheet" href="../css/bootstrap.css">
  <link rel="stylesheet" href="../css/navbar-fixed.css">
  <link rel="stylesheet" href="../css/style_teacher.css">
  <title>Tuition Media Student</title>
</head>
<body>