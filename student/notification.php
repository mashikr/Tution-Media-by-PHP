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
					$post_id = $row['post_id'];
					$date = $row['date'];
					$time = $row['time'];
					 
?>

	<div class="alert alert-success">
      <strong><?php echo $by ?></strong> response to your post. <?php echo $date ?> at <?php echo $time ?>. <a class="alert-link" href="view_profile.php?username=<?php echo $user_by ?>&&p_id=<?php echo $post_id ?>">View his profile.</a>
    </div>
			<?php } ?>
	<!--
	<div class="alert alert-success">
      <strong>Apu </strong> response to your post. <a class="alert-link" href="view_profile.php">View his profile.</a>
    </div>
	<div class="alert alert-success">
      <strong>Sony </strong> response to your post. <a class="alert-link" href="view_profile.php">View his profile.</a>
    </div>
	<div class="alert alert-danger">
      <strong>Abul Hossian </strong> closed tuition contact with you.
    </div>
	-->
<?php include "include/footer.php" ?>