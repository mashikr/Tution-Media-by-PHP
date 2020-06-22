<?php ob_start(); ?>
<?php session_start(); ?>
<?php include "../db.php" ?>
<?php 	$area = array('Senbagh,Noakhali','Begumganj,Noakhali','Chatkhil,Noakhali','Companiganj,Noakhali','Noakhali Sadar,Noakhali','Hatiya,Noakhali','Kabirhat,Noakhali','Sonaimuri,Noakhali','Suborno Char,Noakhali'); ?>
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
					<label for="name">Name:<sup class="text-danger"><b>*</b></sup></label>
					<input type="text" name="name" class="form-control" placeholder="Enter name" required />
				</div>
				<div class="form-group">
					<label for="post_image">Set Profile pic: </label>
					<input type="file" name="post_image" />
				</div>
				<div class="form-group">
					<label for="email">Email:</label>
					<input type="text" name="email" class="form-control" placeholder="Enter email" />
				</div>
				<div class="form-group">
					<label for="education">Education: <sup class="text-danger"><b>*</b></sup> </label>
					<div class="form-group">
						<input class="form-control" name="education" type="text" placeholder="Enter Education Deatils" required >
					</div>	
				</div>
				<div class="form-group">
					<label for="address">Address: <sup class="text-danger"><b>*</b></sup> </label>
					<div class="input-group">	
						<input class="form-control" name="area" type="text" placeholder="Enter area">
						<div class="input-group-append">
							<select id="" name="area2" class="form-control">
								<?php
								foreach($area as $bg){
									echo "<option value='{$bg}'>{$bg}</option>";
								}
								?>
							</select>
						</div>
					</div>	
				</div>
				<div class="form-group">
					<label for="">Interesred For Teaching: <sup class="text-danger"><b>*</b></sup> </label>
					<div class="input-group ">
						<div class="input-group-prepend">
						  <span class="input-group-text" >
							Primary Level : 
						  </span>
						  </div>
						  <select name="primary1" class="form-control" id="">
							<option value="1">Class 1</option>
							<option value="2">Class 2</option>
							<option value="3">Class 3</option>
							<option value="4">Class 4</option>
							<option value="5">Class 5</option>
							<option value="6">Class 6</option>
							<option value="7">Class 7</option>
							<option value="8">Class 8</option>
							<option value="null" selected>Null</option>
						  </select>
						  <span class="input-group-text">to</span>
						
						<select name="primary2" class="form-control" id="">
							<option value="1">Class 1</option>
							<option value="2">Class 2</option>
							<option value="3">Class 3</option>
							<option value="4">Class 4</option>
							<option value="5">Class 5</option>
							<option value="6">Class 6</option>
							<option value="7">Class 7</option>
							<option value="8">Class 8</option>
							<option value="null" selected>Null</option>
						  </select>
					 </div>
					 <div class="input-group mt-2">
						<div class="input-group-prepend">
						  <span class="input-group-text" >
							Secondary Level : 
						  </span>
						  </div>
						  <span class="input-group-text">Class 9/10</span>
						
						<select name="secondary" class="form-control" id="">
							<option value="Science Group">Science Group</option>
							<option value="Business Group">Business Group</option>
							<option value="Humanity Group">Humanity Group</option>
							<option value="null" selected>Null</option>
						  </select>
						  <input type="text" class="form-control" name="secondary_sub" placeholder="Enter Any Specific Subjects" />
					 </div>
					 <div class="input-group mt-2">
						<div class="input-group-prepend">
						  <span class="input-group-text" >
							College Level : 
						  </span>
						  </div>
						  <span class="input-group-text">Class 11/12</span>
						
						<select name="college" class="form-control" id="">
							<option value="Science Group">Science Group</option>
							<option value="Business Group">Business Group</option>
							<option value="Arts Group">Humanity Group</option>
							<option value="null" selected>Null</option>
						  </select>
						  <input type="text" class="form-control" name="college_sub" placeholder="Enter Any Specific Subjects" />
					 </div>
					 <div class="input-group mt-2">
						<div class="input-group-prepend">
						  <span class="input-group-text" >
							Honours Level : 
						  </span>
						  </div>
						  <input type="text" class="form-control" name="honours_sub" placeholder="Enter Any Specific Subjects" />
					 </div>
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
		$education = $_POST['education'];
		$area = $_POST['area'];
		$area2 = $_POST['area2'];
		$address = $area.','.$area2;
		$primary1 = $_POST['primary1'];
		$primary2 = $_POST['primary2'];
		
		if($primary1 == 'null'|| $primary2 == 'null'){
			$primary = null;
		}
		else{
			$primary = $primary1;
			$primary1++;
			while($primary1<=$primary2){
				$primary .= ','.$primary1;
				$primary1++;
			}
		}
		
		$secondary = $_POST['secondary'];
		$secondary_sub = $_POST['secondary_sub'];
		if($secondary == 'null'){
			$_secondary = null;
		}
		else{
			if(empty($secondary_sub)){
			$_secondary = $secondary;
			}
			else{
				$_secondary = $secondary . "($secondary_sub)";
			}
			
		}
		$college = $_POST['college'];
		$college_sub = $_POST['college_sub'];
		
		if($college == 'null'){
			$_college = null;
		}
		else{
			if(empty($college_sub)){
			$_college = $college;
			}
			else{
				$_college = $college . "($college_sub)";
			}
			
		}
		$honours = $_POST['honours_sub'];
		
		$post_image = $_FILES['post_image']['name'];
		$post_image_temp = $_FILES['post_image']['tmp_name'];
				
		move_uploaded_file($post_image_temp, "../img/$post_image");
		$post_image = 'img/'. $post_image;
		
		$query = "UPDATE teacher SET ";
		$query .="`name` = '{$name}', ";
		$query .="`email` = '{$email}', ";
		$query .="`image` = '{$post_image}', ";
		$query .="`education` = '{$education}', ";
		$query .="`address` = '{$address}', ";
		$query .="`primary` = '{$primary}', ";
		$query .="`secondary` = '{$_secondary}', ";
		$query .="`college` = '{$_college}', ";
		$query .="`honours` = '{$honours}', ";
		
		$query .="`status` = 'set' ";
		
		$query .="WHERE `username` = '{$_SESSION['tmusername']}'";
		echo $query;
		
		$set_profile_query = mysqli_query($connection, $query);
			if(!$set_profile_query){
				die("QUERY FAILED " . mysqli_error($connection));
			}
			header("Location: index.php");
			
	}
?>