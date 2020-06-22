<?php include "include/header.php" ?>
<?php include "include/navbar.php" ?>
<div class="row">
<?php
		if(isset($_GET['source'])){
			$source = $_GET['source'];
			if ($source == 'honours'){
				$query = "SELECT * FROM `teacher` WHERE `honours`!=''";
			}
			else if ($source == 'college'){
				$query = "SELECT * FROM `teacher` WHERE `college`!=''";
			}
			else if ($source == 'secondary'){
				$query = "SELECT * FROM `teacher` WHERE `secondary`!=''";
			}
			else if ($source == 'primary'){
				$query = "SELECT * FROM `teacher` WHERE `primary`!=''";
			}
				//echo $query;
				$all_posts = mysqli_query($connection, $query);
				$count = mysqli_num_rows($all_posts);
				if($count==0){
					echo "<h3>No teacher available</h3>";
				}
				else{
				while($row = mysqli_fetch_assoc($all_posts)){
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
?> 
					
						<div class="col-sm-6 col-md-4">
							<div class="card">
							  <img class="card-img-top" src="../<?php echo $image ?>" alt="Image">
							  <div class="card-body">
								<h4><b>Name:</b> <?php echo $name ?></h4>
								<p><b>Education:</b> <?php echo $education ?></p>
								<p><b>Phone:</b> <?php echo $phone ?></p>
								<p><b>Email:</b> <?php echo $email ?></p>
								<p><b>Interedred in:</b> <?php if(!empty($primary)){echo "Class ".$primary;} ?> <?php if(!empty($secondary)) {echo "<br />Class 9/10 ". $secondary; }?>  <?php if(!empty($college)){ echo "<br />Class 11/12 ".$college; }?> <?php if(!empty($honours)){ echo "<br /> Honours ".$honours; }?></p>
								<p><b>Address:</b> <?php echo $address ?></p>
								<a class="btn btn-info" href="#">Read more</a>
							  </div>
							</div>
						</div>
					
				<?php }} }?>	

<?php
	if(isset($_POST['search2'])){
		$area = $_POST['area'];
		
		$query = "SELECT * FROM teacher WHERE address LIKE '%$area%'";
		$all_posts = mysqli_query($connection, $query);
				$count = mysqli_num_rows($all_posts);
				if($count==0){
					echo "<h3>No teacher available</h3>";
				}
				else{
				while($row = mysqli_fetch_assoc($all_posts)){
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
?> 
					
						<div class="col-sm-6 col-md-4">
							<div class="card">
							  <img class="card-img-top" src="../<?php echo $image ?>" alt="Image">
							  <div class="card-body">
								<h4><b>Name:</b> <?php echo $name ?></h4>
								<p><b>Education:</b> <?php echo $education ?></p>
								<p><b>Phone:</b> <?php echo $phone ?></p>
								<p><b>Email:</b> <?php echo $email ?></p>
								<p><b>Interedred in:</b> <?php if(!empty($primary)){echo "Class ".$primary;} ?> <?php if(!empty($secondary)) {echo "<br />Class 9/10 ". $secondary; }?>  <?php if(!empty($college)){ echo "<br />Class 11/12 ".$college; }?> <?php if(!empty($honours)){ echo "<br /> Honours ".$honours; }?></p>
								<p><b>Address:</b> <?php echo $address ?></p>
								<a class="btn btn-info" href="#">Read more</a>
							  </div>
							</div>
						</div>
					
				<?php }} }?>	
</div>
<?php include "include/footer.php" ?>