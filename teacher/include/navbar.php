<?php
	$query = "SELECT * FROM teacher WHERE username = '{$_SESSION['tmusername']}'";
		$fetch_data = mysqli_query($connection, $query);
		while($row = mysqli_fetch_assoc($fetch_data)){
			$name = $row['name'];
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
		}
?>
<div class="container">
	<div class="min-height">
	<nav class="navbar navbar-expand navbar-light custom_color mb-3">

		<ul class="navbar-nav">
			<li class="nav-item profile_icon">
				<a class="nav-link" href="profile.php">
					<img src="../<?php echo $image ?>" class="img-fluid rounded-circle" width="30px" alt="User Image"> <?php echo $_SESSION['tmusername'] ?></a>
			  </li>
		  <li class="nav-item  d-sm-inline-block">
			<a href="index.php" class="nav-link">Home</a>
		  </li>
		  
		</ul>
		  
	  <!-- Right navbar links -->
		<ul class="navbar-nav ml-auto">
		<?php 
			$query1 = "SELECT * FROM `response` WHERE `status`='unseen' AND `to` = '{$_SESSION['tmusername']}' ORDER BY id DESC";
			$search_query = mysqli_query($connection, $query1);
				$count = mysqli_num_rows($search_query);
		?>
		  <!-- Notifications Dropdown Menu -->
		  <li class="nav-item dropdown">
			<a class="nav-link" data-toggle="dropdown" href="#">
			  <i class="far fa-bell"></i><?php if($count !== 0){ echo "<sup class='badge badge-warning'>$count</sup>"; }?>
			</a>
			<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
			<?php
				while($row = mysqli_fetch_assoc($search_query)){
					$by = $row['by'];
					$situation = $row['situation'];
					
					if($situation == 'accept'){
				
			?>
			  <a href="notification.php" class="dropdown-item">
				<b class="text-primary"><?php echo $by ?></b> Hired you for a tuition
			  </a>
			  <div class="dropdown-divider"></div>
			  
			<?php } 
				else{
					?>
					<a href="notification.php" class="dropdown-item">
						<b class="text-primary"><?php echo $by ?></b> Decline your tuition request.
					</a>
					<div class="dropdown-divider"></div>	
					
			<?php	
				}
					} ?>
			  <a href="notification.php" class="dropdown-item dropdown-footer">See All Notifications</a>
			</div>
		  </li>
		  <li class="nav-item">
			<abbr title="Sign Out">
				<a class="nav-link" href="../logout.php">
					<i class="fas fa-sign-out-alt"></i>
				</a>
			</abbr>
		  </li>
		</ul>
	</nav>