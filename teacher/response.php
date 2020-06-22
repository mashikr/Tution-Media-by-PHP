<?php ob_start(); ?>
<?php session_start(); ?>
<?php include "../db.php" ?>
<?php
		$query = "SELECT name FROM teacher WHERE username = '{$_SESSION['tmusername']}'";
		$fetch_data = mysqli_query($connection, $query);
		while($row = mysqli_fetch_assoc($fetch_data)){
			$name = $row['name'];
		}
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		
		$query1 = "SELECT * FROM posts WHERE id = $id";
		$post = mysqli_query($connection, $query1);
		
		while($row = mysqli_fetch_assoc($post)){
			$username = $row['username'];
			$title = $row['title'];
		
			$query = "INSERT INTO `response`( `by`,`user_by`, `to`, `post_id`,`title`, `date`, `time`)";
			 $query .= "VALUES ('{$name}','{$_SESSION['tmusername']}','{$username}',{$id},'Teacher need for Class {$title}',now(),now())";	 
		}
		echo $query;
			$query = mysqli_query($connection, $query);
			if(!$query){
				die("Query Failed " . mysqli_error());
			}
			header("Location: index.php");
	}


?>