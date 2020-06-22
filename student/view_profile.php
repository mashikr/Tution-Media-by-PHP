<?php include "include/header.php" ?>
<?php include "include/navbar.php" ?>
<?php
	if(isset($_GET['username'])){
		$username = $_GET['username'];
		$p_id = $_GET['p_id'];
		$query = "SELECT * FROM teacher WHERE username = '$username'";
		$fetch_data = mysqli_query($connection, $query);
		while($row = mysqli_fetch_assoc($fetch_data)){
			$t_name = $row['name'];
			$email = $row['email'];
			$phone = $row['phone'];
			$image = $row['image'];
			$education = $row['education'];
			$address = $row['address'];
			$primary = $row['primary'];
			$secondary = $row['secondary'];
			$college = $row['college'];
			$honours = $row['honours'];

			$status = $row['status'];
			if(empty($image)){$image = "img/student.png";} 

?>
<div class="row">
	<div class="col-sm-6"><h3>Teacher Profile</h3></div>
	<div class="col-sm-6">
		<form action="" method="post">
			<?php
				$query1 = "SELECT situation FROM response WHERE user_by = '{$_SESSION['tmusername']}' AND post_id = $p_id";
				$fetch_data1 = mysqli_query($connection, $query1);
				while($row = mysqli_fetch_assoc($fetch_data1)){
					$situation = $row['situation'];
				}
				if($situation == 'accept'){
					echo "<button type='submit' name='decline' class='btn btn-danger float-sm-right'>Decline</button>";
				}
				else{
					echo "<button type='submit' name='accept' class='btn btn-success float-sm-right'>Accept</button>";
				}
			?>

			
		</form>
		
		<!-- <button class="btn btn-danger float-sm-right mr-2">Decline</button> -->
	</div>
</div>
<hr>
<div class="container emp-profile">
	<form method="post">
		<div class="row">
			<div class="col-md-4">
				<div class="profile-img">
					<img src="../<?php echo $image ?>".jpg" alt=""/>
				</div>
			</div>
			<div class="col-md-8">
				<div class="profile-head">
							<h5>
								<?php echo $t_name ?>
							</h5>
							<h6>
								Teacher
							</h6>						   
					<ul class="nav nav-tabs" id="myTab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
						</li>   
					</ul>
				</div>
				<div class="row">
					<div class="col-md-6">
						<label>Education</label>
					</div>
					<div class="col-md-6">
						<p><?php echo $education ?></p>
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
						<label>Ability Teaching</label>
					</div>
					<div class="col-md-6">
						<p><?php if(!empty($primary)){echo "Class ".$primary;} ?> <?php if(!empty($secondary)) {echo "<br />Class 9/10 ". $secondary; }?>  <?php if(!empty($college)){ echo "<br />Class 11/12 ".$college; }?> <?php if(!empty($honours)){ echo "<br /> Honours ".$honours; }?></p>
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
<?php
	if(isset($_POST['accept'])){
		$username = $_GET['username'];
		$p_id = $_GET['p_id'];
		$by = $_SESSION['tmusername'];
		
		$query = "SELECT title FROM `response` WHERE post_id = $p_id";
		$search_query = mysqli_query($connection, $query);
		
			while($row = mysqli_fetch_assoc($search_query)){
					$title = $row['title'];
			}
		
		$query1 = "INSERT INTO `response`(`user_by`, `by`, `to`, `post_id`, `title`, `date`, `time`,`situation`) ";
		$query1 .= "VALUES ('$by','$name','$username','$p_id','$title',now(),now(),'accept')";
		
		$query = mysqli_query($connection, $query1);
		header("Location: view_profile.php?username=$username&&p_id=$p_id");
	}
	
	if(isset($_POST['decline'])){
		$username = $_GET['username'];
		$p_id = $_GET['p_id'];
		$by = $_SESSION['tmusername'];
		
		$query = "SELECT title FROM `response` WHERE post_id = $p_id";
		$search_query = mysqli_query($connection, $query);
		
			while($row = mysqli_fetch_assoc($search_query)){
					$title = $row['title'];
			}
		
		$query1 = "INSERT INTO `response`(`user_by`, `by`, `to`, `post_id`, `title`, `date`, `time`,`situation`) ";
		$query1 .= "VALUES ('$by','$name','$username','$p_id','$title',now(),now(),'decline')";
		
		$query = mysqli_query($connection, $query1);
		header("Location: view_profile.php?username=$username&&p_id=$p_id");
	}
?>