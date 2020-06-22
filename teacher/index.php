<?php include "include/header.php" ?>
<?php include "include/navbar.php" ?>
	<div class="row">
		<div class="col-md-8">
			<section>
			<?php
				$query = "SELECT * FROM posts";
				
				$all_posts = mysqli_query($connection, $query);
				$count = mysqli_num_rows($all_posts);
				if($count==0){
					echo "<h3>No post available</h3>";
				}
				
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
				<?php
					$query1 = "SELECT * FROM `response` WHERE `by`='{$_SESSION['tmusername']}' AND `post_id`=$id";
					$search_query = mysqli_query($connection, $query1);
						
						$count = mysqli_num_rows($search_query);
						if($count == 0){ ?>
							<div class="card-footer">
								<a class="btn btn-primary" href="response.php?id=<?php echo $id ?>">Response</a>
							</div>
					<?php
						}
					else{ ?>
						<div class="card-footer">
							<h4>Responded</h4>
						</div>
					<?php
						}
					?>
						
					</div>
				<?php }?>	
					<!--
					<div class="card p-3 mt-3">
						<div class="card-header">
							<h2>Teacher need for class 8</h2>
							<p class="lead">
								ref by <a href="index.php">Ahmed khan</a>
							</p>
							<p><i class="far fa-clock"></i> Posted on February 12, 2020 at 10:45 PM</p>
						</div>
						<div class="card-body">
							<p>A teacher need who can teaching for class 8 student. Subjects are Math,English,Generel Science.</p>
							<b> 3 day in week.</b><br />
							<b> salary 2500</b>

						</div>
						<div class="card-footer">
							<a class="btn btn-primary" href="#">Response</a>
						</div>
					</div>
					-->
			</section>
		</div>
		<div class="col-md-4">
			<div class="card p-3 bg-light">
                   <div class="card-header">
					 <h4>Tuition Categories</h4>
				   </div>
                    <div class="card-body">
						<h5>By Class:</h5>
						<ul class="list-unstyled">
							<li><a href="category.php?source=honours">Honours</a></li>
							<li><a href="category.php?source=college">College</a></li>
							<li><a href="category.php?source=secondary">Class 9-10</a></li>
							<li><a href="category.php?source=high">High School</a></li>
							<li><a href="category.php?source=primary">Primary School</a></li>	
						</ul>
						<hr />
						<h5>By Salary:</h5>
						<form action="category.php" class="form-inline" method="post">
							<div class="input-group">
								<div class="input-group-prepend">
								  <span class="input-group-text" >Up to:</span> 
								</div>
								<input name="salary" class="form-control" type="text" placeholder="Enter Salary">
								<span class="input-group-append"><button class="btn btn-info" type="search" name="search1">Search</button></span>
							</div>		
						</form>
						<hr />
                       <h5>By Area:</h5>
						<form action="category.php" class="form-inline" method="post">
							<div class="input-group">
								<div class="input-group-prepend">
								  <span class="input-group-text" >Area:</span> 
								</div>
								<input name="area" class="form-control" type="text" placeholder="Enter area">
								<span class="input-group-append"><button class="btn btn-info" type="search" name="search2">Search</button></span>
							</div>		
						</form>
                    </div>
                </div>
		</div>
	</div>
<?php include "include/footer.php" ?>