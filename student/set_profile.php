<?php ob_start(); ?>
<?php session_start(); ?>
<?php include "../db.php" ?>
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
<div class="container">
	<div class="min-height">
	<nav class="navbar navbar-expand navbar-light custom_color mb-3">

		<ul class="navbar-nav">
			<li class="nav-item profile_icon">
				<a class="nav-link" href="profile.php">
					<img src="../img/student.png" class="img-fluid rounded-circle" width="30px" alt="User Image"> <?php echo $_SESSION['tmusername'];?></a>
			</li>
		</ul>
	</nav>
	<section Class="card p-4">
		<div class="card-header">
			<h3>Set Your Profile</h3>
		</div>
		<div class="card-body">
			<form action="" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="title">Name:</label>
					<input type="text" name="name" class="form-control" placeholder="Enter name" required />
				</div>
				<div class="form-group">
					<label for="image">Set Profile pic: </label>
					<input type="file" name="post_image" />
				</div>
				<div class="form-group">
					<label for="title">Email:</label>
					<input type="text" name="email" class="form-control" placeholder="Enter email" />
				</div>
				
				<?php 
					if($_SESSION['tmuser_role'] == 'student'){
				?>
				
						<div class="form-group">
							<label for="post_content">Education: <sup class="text-danger"><b>*</b></sup> </label>
							<div class="input-group">
								<div class="input-group-prepend">
								  <span class="input-group-text" >Class:</span> 
								</div>
								<input class="form-control" name="profession" type="text" placeholder="Enter class" required >
							</div>	
						</div>
				<?php
					}
				?>
				<?php 
					if($_SESSION['tmuser_role'] == 'parents'){
				?>
				
						<div class="form-group">
							<label for="post_content">Profession: <sup class="text-danger"><b>*</b></sup> </label>
							<input class="form-control" name="profession" type="text" placeholder="Enter Profession" required >	
						</div>
				<?php
					}
				?>
				
				<div class="form-group">
					<label for="days">Address: <sup class="text-danger"><b>*</b></sup> </label>
					<input type="text" class="form-control" name="address" placeholder="Enter address" required />
				</div>
				
				<div class="form-group">
					<input type="submit" class="btn btn-primary" name="submit" value="Set" />
				</div>
			</form>
		</div>
	</section>
	
<?php include "include/footer.php" ?>
<?php
	if(isset($_POST['submit'])){
		$name = $_POST['name'];			
		$email = $_POST['email'];
		$profession = $_POST['profession'];
		$address = $_POST['address'];
		$post_image = $_FILES['post_image']['name'];
		$post_image_temp = $_FILES['post_image']['tmp_name'];
				
		move_uploaded_file($post_image_temp, "../img/$post_image");
		$post_image = 'img/'. $post_image;
		
		$query = "UPDATE {$_SESSION['tmuser_role']} SET ";
		$query .="name = '{$name}', ";
		$query .="email = '{$email}', ";
		$query .="image = '{$post_image}', ";
		
		if($_SESSION['tmuser_role'] == 'student'){
			$query .="education = '{$profession}', ";
		}
		else{
			$query .="profession = '{$profession}', ";
		}
		
		$query .="address = '{$address}', ";
		$query .="status = 'set' ";
		
		$query .="WHERE username = '{$_SESSION['tmusername']}'";
		
		$set_profile_query = mysqli_query($connection, $query);
			if(!$set_profile_query){
				die("QUERY FAILED " . mysqli_error($connection));
			}
			header("Location: index.php");
	}
?>