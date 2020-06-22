<?php include "include/header.php" ?>
<?php include "include/navbar.php" ?>
<?php 

	$class = array('1', '2','3', '4', '5', '6', '7','8','9 (Science Group)','9 (Business Group)','9 (Arts Group)','10 (Science Group)','10 (Business Group)','10 (Arts Group)','11 (Science Group)','11 (Business Group)','11 (Arts Group)','12 (Science Group)','12 (Business Group)','12 (Arts Group)','Honours');
	$area = array('Senbagh,Noakhali','Begumganj,Noakhali','Chatkhil,Noakhali','Companiganj,Noakhali','Noakhali Sadar,Noakhali','Hatiya,Noakhali','Kabirhat,Noakhali','Sonaimuri,Noakhali','Suborno Char,Noakhali');

		$query = "SELECT * FROM posts WHERE username = '{$_SESSION['tmusername']}' ORDER BY id DESC";
		
		$all_posts = mysqli_query($connection, $query);
		$count = mysqli_num_rows($all_posts);
		if($count==0){
			echo "<h3>No post available</h3>";
		}
		
		while($row = mysqli_fetch_assoc($all_posts)){
			$id = $row['id'];
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
			<p><i class="far fa-clock"></i> Posted on <?php echo $date ?> at <?php echo $time ?></p>
		</div>
		<div class="card-body">
			<p><?php echo $content ?></p>
			<b> <?php echo $days ?> day in week.</b><br />
			<b> Salary <?php echo $salary ?></b> <br />
			<b> Location: <?php echo $location ?></b>

		</div>
		<div class="card-footer">
			<button class="btn btn-info" type="button" data-toggle="modal" data-target="#loginModal">Edit</button>

				<div class="modal" id="loginModal">
				<form action="" method="post">
				  <div class="modal-dialog">
					<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title">Edit Post</h5>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					  </div>
					  <div class="modal-body">
						<div class="form-group">
						<label for="id">Post Id :</label>
							<select id="" name="id" class="form-control">
								<option value='<?php echo $id ?>'><?php echo $id ?></option>";
							</select>
						 <label for="title">Class:</label>
							<select id="" name="title" class="form-control">
								<?php
								foreach($class as $bg){
									if($bg == $title)
										echo "<option value='{$bg}' selected>{$bg}</option>";
									else 
									echo "<option value='{$bg}'>{$bg}</option>";
								}
								?>
							</select>
						</div>
						<div class="form-group">
							<label for="post_content">Tuition Content:</label>
							<textarea class="form-control" name="content" rows="2" ><?php echo $content ?></textarea>
						</div>
						<div class="form-group">
						  <label for="password">Days in week:</label>
						  <input class="form-control" type="text" name="days" value="<?php echo $days ?>">
						</div>
						<div class="form-group">
						  <label for="password">Salary:</label>
						  <input class="form-control" name="salary" type="text" value="<?php echo $salary ?>">
						</div>
						
					   </div>
					  <div class="modal-footer">
						<button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
						<input type="submit" class="btn btn-success" name="edit" value="Edit" />
					  </div>
					</div>
				  </div>
				  </form>
				</div>
			
			<a class="btn btn-danger" href="posts.php?delete=<?php echo $id ?>" onclick="javascript: return confirm('Are you sure want to delete?');">Delete</a>
		</div>
	</div>
<?php } ?>
<?php include "include/footer.php" ?>
<?php
		if(isset($_POST['edit'])){
			$id = $_POST['id'];
			$title = $_POST['title'];
			$content = $_POST['content'];
			$days = $_POST['days'];
			$salary = $_POST['salary'];
			
			$query = "UPDATE `posts` SET `title`='{$title}',`content`='{$content}',`days`='{$days}',`salary`='{$salary}' WHERE id = {$id} and username = '{$_SESSION['tmusername']}'";
			
			//echo $query;

			$edit_post_query = mysqli_query($connection, $query);
			if(!$edit_post_query){
				die("QUERY FAILED " . mysqli_error($connection));
			}
			echo "<script type='text/javascript'>alert('Successfully Updated.')</script>";
			header("Location: posts.php");
		}
		
		if(isset($_GET['delete'])){
			echo $post_id = $_GET['delete'];
			
			$query = "DELETE FROM posts WHERE id = {$post_id}";
			
			$delete_query = mysqli_query($connection, $query);
			if(!$delete_query){
				die("Query Failed " . mysqli_error());
			}
			header("Location: posts.php");
		
		}
?>