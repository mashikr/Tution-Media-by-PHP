<?php include "include/header.php" ?>
<?php include "include/navbar.php" ?>
<?php
		$query = "UPDATE `response` SET `status`= 'seen' WHERE`to` = '{$_SESSION['tmusername']}'";
		$_query = mysqli_query($connection, $query);
		
		$query1 = "SELECT * FROM `response` WHERE `to` = '{$_SESSION['tmusername']}' ORDER by id DESC";
		$search_query = mysqli_query($connection, $query1);
		
		
			while($row = mysqli_fetch_assoc($search_query)){
					$user_by = $row['user_by'];
					$by = $row['by'];
					$title = $row['title'];
					$post_id = $row['post_id'];
					$date = $row['date'];
					$time = $row['time'];
					$situation = $row['situation'];
					
				
				$query2 = "SELECT * FROM posts WHERE id=$post_id";
				$post = mysqli_query($connection, $query2);
				while($row = mysqli_fetch_assoc($post)){
					$content = $row['content'];
					$days = $row['days'];
					$salary = $row['salary'];
					$location = $row['location'];
					$date = $row['date'];
					$time = $row['time'];
					
					 
?>
	<div class="modal" id="modal<?php echo $post_id ?>">
		  <div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title"><?php echo $title ?></h5>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			  </div>
			  <div class="modal-body">
				<p><?php echo $content ?></p>
				<b> <?php echo $days ?> day in week.</b><br />
				<b> Salary <?php echo $salary ?></b><br />
				<b> Location : <?php echo $location ?></b>
			   </div>
			  <div class="modal-footer mr-auto">
				<i class="far fa-clock"></i> Posted on <?php echo $date ?> at <?php echo $time ?>
			  </div>
			</div>
		  </div>
		  </form>
		</div>
	<?php }
		if($situation == 'accept'){
	?>
		<div class="alert alert-success">
		  <strong><?php echo $by ?></strong> hired you for a tuition of title "<?php echo "<a data-toggle='modal' data-target='#modal$post_id' class='alert-link' href=''>$title</a>" ?>". <?php echo $date ?> at <?php echo $time ?>. <a class="alert-link" href="view_profile.php?username=<?php echo $user_by ?>">View his profile.</a>
		</div>
	<?php }
		else{
	?>
		<div class="alert alert-danger">
		  <strong><?php echo $by ?></strong> decline your tuition request of title "<?php echo "<a data-toggle='modal' data-target='#modal$post_id' class='alert-link' href=''>$title</a>" ?>". <?php echo $date ?> at <?php echo $time ?>.
		</div>
	<?php
		}
			} ?>


<!--
	<div class="alert alert-success">
      <strong>Yousuf Mia </strong> hired you for a tuition of class 10 <a class="alert-link" href="#">Contact with him</a>
    </div>
	<div class="alert alert-danger">
      <strong>Abul Hossian </strong> closed tuition contact with you.
    </div>
	<div class="alert alert-warning">
      <strong>Safik </strong> set pending your request.
    </div>
	-->
<?php include "include/footer.php" ?>