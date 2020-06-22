<?php include "include/header.php" ?>
<?php include "include/navbar.php" ?>
<?php 
	$class = array('1', '2','3', '4', '5', '6', '7','8','9 (Science Group)','9 (Business Group)','9 (Arts Group)','10 (Science Group)','10 (Business Group)','10 (Arts Group)','11 (Science Group)','11 (Business Group)','11 (Arts Group)','12 (Science Group)','12 (Business Group)','12 (Arts Group)','Honours');
	$area = array('Senbagh,Noakhali','Begumganj,Noakhali','Chatkhil,Noakhali','Companiganj,Noakhali','Noakhali Sadar,Noakhali','Hatiya,Noakhali','Kabirhat,Noakhali','Sonaimuri,Noakhali','Suborno Char,Noakhali');
?>
	<div class="row">
		<div class="col-md-8">
			<section Class="card">
				<div class="card-header">
					<h3>Post a tuition</h3>
				</div>
				<div class="card-body">
					<form action="" method="post">
						<div class="form-group">
							<label for="title">Class:</label>
							<select id="" name="title" class="form-control">
								<?php
								foreach($class as $bg){
									echo "<option value='{$bg}'>{$bg}</option>";
								}
								?>
							</select>
						</div>
						
						<div class="form-group">
							<label for="post_content">Tuition Content:</label>
							<textarea class="form-control" name="content" rows="2" required></textarea>
						</div>
						
						<div class="form-group">
							<label for="days">Days in week:</label>
							<input type="text" class="form-control" name="days" required />
						</div>
						
						<div class="form-group">
							<label for="salary">Salary:</label>
							<input type="text" class="form-control" name="salary" required />
						</div>
						<div class="form-group">
						<label for="">Location:</label>
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
							<input type="submit" class="btn btn-primary" name="create_post" value="Publish Post" />
						</div>
					</form>
				</div>
			</section>
		</div>
		<div class="col-md-4">
			<div class="card p-3 bg-light">
                   <div class="card-header">
					 <h4>Teacher Categories</h4>
				   </div>
                    <div class="card-body">
						<h5>By Class:</h5>
						<ul class="list-unstyled">
							<li><a href="category.php?source=honours">Honours</a></li>
							<li><a href="category.php?source=college">College</a></li>
							<li><a href="category.php?source=secondary">High School</a></li>
							<li><a href="category.php?source=primary">Primary School</a></li>
						</ul>
						<hr />
						
						<hr />
                       <h5>By Area:</h5>
						<form action="category.php" class="form-inline" method="post">
							<div class="input-group">
								<div class="input-group-prepend">
								  <span class="input-group-text" >Area:</span> 
								</div>
								<input name="area" class="form-control" type="text" placeholder="Enter area" required>
								<span class="input-group-append"><button class="btn btn-info" type="search" name="search2">Search</button></span>
							</div>		
						</form>
                    </div>
                </div>
		</div>
	</div>
<?php include "include/footer.php" ?>
<?php
		if(isset($_POST['create_post'])){
			$title = $_POST['title'];
			$content = $_POST['content'];
			$days = $_POST['days'];
			$salary = $_POST['salary'];
			$area = $_POST['area'];
			$area2 = $_POST['area2'];
			$location = $area.','.$area2;
			
			$query = "INSERT INTO `posts`(`username`, `title`, `content`, `days`, `salary`, `location`,`date`, `time`) ";
			$query .="VALUES ('{$_SESSION['tmusername']}','{$title}','{$content}','{$days}','{$salary}','{$location}',now(),now())";
			//echo $query;

			
			$create_post_query = mysqli_query($connection, $query);
			if(!$create_post_query){
				die("QUERY FAILED " . mysqli_error($connection));
			}
			echo "<script type='text/javascript'>alert('Successfully Posted.')</script>";
		
		}
	?>