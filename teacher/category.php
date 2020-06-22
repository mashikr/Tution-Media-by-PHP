<?php include "include/header.php" ?>
<?php include "include/navbar.php" ?>
<?php
		if(isset($_GET['source'])){
			$source = $_GET['source'];
			if ($source == 'honours'){
				$query = "SELECT * FROM `posts` WHERE title = 'honours'";
			}
			else if ($source == 'college'){
				$query = "SELECT * FROM `posts` WHERE title LIKE '11%' OR title LIKE '12%'";
			}
			else if ($source == 'secondary'){
				$query = "SELECT * FROM `posts` WHERE title LIKE '9%' OR title LIKE '10%'";
			}
			else if ($source == 'high'){
				$query = "SELECT * FROM `posts` WHERE title >= 6 and title<=8";
			}
			else if ($source == 'primary'){
				$query = "SELECT * FROM `posts` WHERE title >= 1 and title<=5";
			}
				//echo $query;
				$all_posts = mysqli_query($connection, $query);
				$count = mysqli_num_rows($all_posts);
				if($count==0){
					echo "<h3>No post available</h3>";
				}
				else{
				while($row = mysqli_fetch_assoc($all_posts)){
					$id = $row['id'];
					$username = $row['username'];
					$title = $row['title'];
					$content = $row['content'];
					$days = $row['days'];
					$salary = $row['salary'];
					$location = $row['location'];
					$date = $row['date'];
					$time = $row['time'];
	?> 
					<div class="card p-3 mt-2">
						<div class="card-header">
							<h2>Teacher need for <?php echo $title ?></h2>
							<p class="lead">
								ref by <a href="index.php"><?php echo $username ?></a>
							</p>
							<p><i class="far fa-clock"></i> Posted on <?php echo $date ?> at <?php echo $time ?></p>
						</div>
						<div class="card-body">
							<p><?php echo $content ?></p>
							<b> <?php echo $days ?> day in week.</b><br />
							<b> Salary <?php echo $salary ?></b><br />
							<b> Location <?php echo $location ?></b>

						</div>
						<div class="card-footer">
							<a class="btn btn-primary" href="#">Response</a>
						</div>
					</div>
				<?php }} }?>	

<?php
	if(isset($_POST['search1'])){
		$search = $_POST['salary'];
		
		$query = "SELECT * FROM posts WHERE salary >= $search";
		$all_posts = mysqli_query($connection, $query);
			$count = mysqli_num_rows($all_posts);
			if($count==0){
				echo "<h3>No post available</h3>";
			}
			else{
			while($row = mysqli_fetch_assoc($all_posts)){
				$id = $row['id'];
				$username = $row['username'];
				$title = $row['title'];
				$content = $row['content'];
				$days = $row['days'];
				$salary = $row['salary'];
				$location = $row['location'];
				$date = $row['date'];
				$time = $row['time'];
?> 
				<div class="card p-3 mt-2">
					<div class="card-header">
						<h2>Teacher need for <?php echo $title ?></h2>
						<p class="lead">
							ref by <a href="index.php"><?php echo $username ?></a>
						</p>
						<p><i class="far fa-clock"></i> Posted on <?php echo $date ?> at <?php echo $time ?></p>
					</div>
					<div class="card-body">
						<p><?php echo $content ?></p>
						<b> <?php echo $days ?> day in week.</b><br />
						<b> Salary <?php echo $salary ?></b><br />
						<b> Location <?php echo $location ?></b>

					</div>
					<div class="card-footer">
						<a class="btn btn-primary" href="#">Response</a>
					</div>
				</div>
<?php }} }?>	
<?php
	if(isset($_POST['search2'])){
		$area = $_POST['area'];
		
		$query = "SELECT * FROM posts WHERE location LIKE '%$area%'";
		$all_posts = mysqli_query($connection, $query);
			$count = mysqli_num_rows($all_posts);
			if($count==0){
				echo "<h3>No post available</h3>";
			}
			else{
			while($row = mysqli_fetch_assoc($all_posts)){
				$id = $row['id'];
				$username = $row['username'];
				$title = $row['title'];
				$content = $row['content'];
				$days = $row['days'];
				$salary = $row['salary'];
				$location = $row['location'];
				$date = $row['date'];
				$time = $row['time'];
?> 
				<div class="card p-3 mt-2">
					<div class="card-header">
						<h2>Teacher need for <?php echo $title ?></h2>
						<p class="lead">
							ref by <a href="index.php"><?php echo $username ?></a>
						</p>
						<p><i class="far fa-clock"></i> Posted on <?php echo $date ?> at <?php echo $time ?></p>
					</div>
					<div class="card-body">
						<p><?php echo $content ?></p>
						<b> <?php echo $days ?> day in week.</b><br />
						<b> Salary <?php echo $salary ?></b><br />
						<b> Location <?php echo $location ?></b>

					</div>
					<div class="card-footer">
						<a class="btn btn-primary" href="#">Response</a>
					</div>
				</div>
<?php }} }?>

<?php include "include/footer.php" ?>