<?php include "include/header.php" ?>
<?php include "include/navbar.php" ?>
<?php
	if(isset($_GET['username'])){
	$username = $_GET['username'];
	
		$query1 = "SELECT role FROM users WHERE username = '{$username}'";
		$fetch_data1 = mysqli_query($connection, $query1);
		while($row = mysqli_fetch_assoc($fetch_data1)){
			$role = $row['role'];
		}
			
		$query = "SELECT * FROM {$role} WHERE username = '{$username}'";
		$fetch_data = mysqli_query($connection, $query);
		while($row = mysqli_fetch_assoc($fetch_data)){
			$name = $row['name'];
			$email = $row['email'];
			$phone = $row['phone'];
			$image = $row['image'];
			if($role == 'student'){
				$profession = $row['education'];
			}
			else{
				$profession = $row['profession'];
			}
			$address = $row['address'];

			$status = $row['status'];
			if(empty($image) || $image == 'img/'){$image = "img/student.png";} 
?>
<div class="row">
	<div class="col-sm-6"><h3><?php 
									if($role == 'student'){
										echo "Student";
									} 
									else{
										echo "Parents";
									}
								?> Profile</h3></div>
</div>
<hr>
<div class="container emp-profile">
	<form method="post">
		<div class="row">
			<div class="col-md-4">
				<div class="profile-img">
					<img src="../<?php echo $image ?>" alt=""/>
				</div>
			</div>
			<div class="col-md-8">
				<div class="profile-head">
							<h5><?php echo $name ?></h5>
							<h6><?php 
									if($role == 'student'){
										echo "Student";
									} 
									else{
										echo "Parents";
									}
								?>
							</h6>						   
					<ul class="nav nav-tabs" id="myTab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
						</li>   
					</ul>
				</div>
				 <div class="row">
					<div class="col-md-6">
						<label>Student Username</label>
					</div>
					<div class="col-md-6">
						<p><?php echo $name ?></p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<?php if($role == 'student'){ ?>
							<label>Class:</label>
						<?php } else {?>
							<label>Profession:</label>
						<?php } ?>
					</div>
					<div class="col-md-6">
						<p><?php echo $profession ?></p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<label>Phone</label>
					</div>
					<div class="col-md-6">
						<p><?php echo $phone ?></p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<label>Email</label>
					</div>
					<div class="col-md-6">
						<p><?php echo $email ?></p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<label>Address</label>
					</div>
					<div class="col-md-6">
						<p><?php echo $address ?></p>
					</div>
				</div>
			</div>
		</div>
	</form> 
</div>
<?php
		}
	}
?>
<?php include "include/footer.php" ?>