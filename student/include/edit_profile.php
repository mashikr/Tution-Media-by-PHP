<?php 
	if(isset($_POST['update'])){
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$profession = $_POST['profession'];
		$address = $_POST['address'];
		$_password = $_POST['pass'];
		$_c_password = $_POST['c_pass'];
		$post_image = $_FILES['post_image']['name'];
		

		if($_password !== $_c_password){
			echo "<p class='text-danger'>Password not same..!!</p>";
		}
		else
		{
			if(empty($post_image)){
				$post_image = $image;
			}
			else{
				$post_image_temp = $_FILES['post_image']['tmp_name'];
				move_uploaded_file($post_image_temp, "../img/$post_image");
				$post_image = 'img/'. $post_image;
				if($image !== "img/student.png"){
					unlink("../$image");
				}
			}
			
			$query = "UPDATE {$_SESSION['tmuser_role']} SET ";
			$query .="phone = '{$phone}', ";
			$query .="email = '{$email}', ";
			if($_SESSION['tmuser_role'] == 'student'){
				$query .="education = '{$profession}', ";
			}
			else{
				$query .="profession = '{$profession}', ";
			}
			$query .="address = '{$address}', ";
			$query .="image = '{$post_image}' ";
			$query .="WHERE username = '{$_SESSION['tmusername']}'";
			
			if(!empty($_password)){
				$query1 = "UPDATE users SET `password` = '$_password' WHERE `username` = '{$_SESSION['tmusername']}'";
				$update_password = mysqli_query($connection, $query1);
				if(!$update_password){
				die("Update Failed " . mysqli_error());
				}
			}
			
			$update_post_query = mysqli_query($connection, $query);
			if(!$update_post_query){
				die("Update Failed " . mysqli_error());
			}
			header("Location: profile.php");
		}
		
	}
?>
<h1 class='text-center'>Edit Profile</h1>
  	<hr>
	<form action="" method="post" enctype="multipart/form-data">
	<div class="row">
      <!-- left column -->
      <div class="col-md-4">
        <div class="text-center">
          <img width='150px' src="../<?php echo $image ?>" class="img-fluid rounded-circle" alt="avatar">
          <h6 class="mt-2">Upload a different photo...</h6>
		  <div class="card">
			<div class="py-2">
				<input type="file" name="post_image" >
			</div>
		  </div>
        </div>
      </div>
      
      <!-- edit form column -->
      <div class="col-md-8 personal-info">
       
        <h3>Personal info</h3>
          <div class="form-group">
            <label class="col-12 control-label">Name:  <?php echo $name ?></label>
         </div>
		 <div class="form-group">
            <?php if($_SESSION['tmuser_role'] == 'student'){ ?>
				<label class="col-lg-3 control-label">Class:</label>
			<?php } else {?>
				<label class="col-lg-3 control-label">Profession:</label>
			<?php } ?>
            <div class="col-lg-8">
              <input class="form-control" name="profession" type="text" value="<?php echo $profession ?>"  required>
            </div>
          </div>
         <div class="form-group">
            <label class="col-lg-3 control-label">Phone no:</label>
            <div class="col-lg-8">
              <input class="form-control" name="phone" type="text" value="<?php echo $phone ?>"  required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <input class="form-control" name="email" type="text" value="<?php echo $email ?>"  required>
            </div>
          </div>
        
		  <div class="form-group">
            <label class="col-lg-3 control-label">Address:</label>
            <div class="col-lg-8">
              <input class="form-control" name="address" type="text" value="<?php echo $address ?>"  required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Password:</label>
            <div class="col-lg-8">
              <input name="pass" class="form-control" type="password">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-6 control-label">Confirm password:</label>
            <div class="col-lg-8">
              <input name="c_pass" class="form-control" type="password">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-lg-8">
              <input type="submit" name="update" class="btn btn-primary" value="Save Changes">
              <span></span>
              <input type="reset" class="btn btn-default" value="Cancel">
            </div>
          </div>
      </div>
	 </div>
</form>