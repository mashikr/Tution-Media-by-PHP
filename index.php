<?php ob_start(); ?>
<?php session_start(); ?>
<?php include "db.php" ?>
<?php
		$username2 = "";
		$phone2 = "";
		$password3 = "";
		
				if(isset($_POST['signup'])){
					
					$username = $_POST['username'];
					$phone = $_POST['phone'];
					$password = $_POST['password'];
					$password2 = $_POST['confirmpassword'];
					$role = $_POST['role'];
					
					$username = mysqli_real_escape_string($connection, $username);
					$phone = mysqli_real_escape_string($connection, $phone);
					$password = mysqli_real_escape_string($connection, $password);
					$password2 = mysqli_real_escape_string($connection, $password2);
					$role = mysqli_real_escape_string($connection, $role);
					
					
					if($password !== $password2){
							echo '<script language="javascript">';
							echo "alert('Password not matched**')"; 
							echo '</script>';
						$username2 = $username;
						$phone2 = $phone;
						$password3 = $password;
					}
					else{
						$query = "SELECT * FROM users WHERE username = '{$username}'";
						$user_query = mysqli_query($connection,$query);
						$count = mysqli_num_rows($user_query);
						
						
						if($count == 1){
							echo '<script language="javascript">';
							echo "alert('The username already exists**')"; 
							echo '</script>';
							$username2 = $username;
							$phone2 = $phone;
							$password3 = $password;
							
						}else{
						
							$query1 = "INSERT INTO users (username, password, role) ";
							$query1 .= "VALUES ('{$username}', '{$password}', '{$role}')";
							$user_registry = mysqli_query($connection, $query1);
							if(!$user_registry){
								die("Query Failed " . mysqli_error($connection));	
							}
							$user_registry2 = mysqli_query($connection, "INSERT INTO {$role} (username,phone,status) VALUES ('{$username}', '{$phone}','unset')");
							
							echo '<script language="javascript">';
							echo "alert('Registration Succesfull..!!')"; 
							echo '</script>';
						
						}
					}
					//header("Location: index.php");
				}
			
			
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="shortcut icon" type="image/x-icon" href="img/icon.png">
  <link rel="stylesheet" href="css/all.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/navbar-fixed.css">
  <link rel="stylesheet" href="css/style.css">
  <title>Tuition Media</title>
</head>
<body>
  <nav class="navbar navbar-dark navbar-expand-md fixed-top">
    <div class="container">
      <a href="index.php" class="navbar-brand">Tuition Media</a>
      <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a class="nav-link" href="#home-section">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="#about-section">About Us</a></li>
          <li class="nav-item"><a class="nav-link" href="#service-section">Services</a></li>
          <li class="nav-item"><a class="nav-link" href="#login-section">Log in</a></li>
          
        </ul>
      </div>
    </div>
  </nav>
<!-- HEAD SECTION-->
  <section id="home-section">
    <div class="dark-overlay">
      <div class="home-inner">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-lg-8">
              <h1 class="display-4">Build <strong>social profiles</strong> and gain <strong>revenue</strong> and <strong>profits</strong></h1>
              <div class="d-flex flex-row">
                <div class="p-4 align-self-start mt-4">
                  <i class="fa fa-check"></i>
                </div>
                <div class="lead align-self-end p-4">
                  You are capable for teaching ? want teaching ? 
                </div>
              </div>
              <div class="d-flex flex-row">
                <div class="p-4 align-self-start mt-4">
                  <i class="fa fa-check"></i>
                </div>
                <div class="lead align-self-end p-4">
                  You are a Student or Parents ? Need a House Tuitor ?
                </div>
              </div>
              <div class="d-flex flex-row">
                <div class="p-4 align-self-start mt-4">
                  <i class="fa fa-check"></i>
                </div>
                <div class="lead align-self-end p-4">
                  Manage Tuition Here.
                </div>
              </div>
            </div>
            <div class="col-sm-12 col-lg-4">
                <div class="card bg-primary text-center">
				<form action="" method="post">
					  <div class="card-body">
						<h2>Sign Up Today</h2>
						<p>Please fill out this form to register</p>
						<div class="form-group">
						  <input type="text" name="username" placeholder="Username" class="form-control" required value="<?php echo $username2; ?>">
						</div>
						<div class="form-group">
						  <input type="text" name="phone" placeholder="Phone No" class="form-control" required value="<?php echo $phone2; ?>" >
						</div>
						<div class="form-group">
						  <input type="password" name="password" placeholder="Password" class="form-control" required value="<?php echo $password3; ?>">
						</div>
						<div class="form-group">
						  <input type="password" name="confirmpassword" placeholder="confirm Password" class="form-control" required >
						</div>
						 
						  <div class="form-group">
								Sign up as: 
							  <input type="radio"  name="role" value="teacher" required >
							  <label for="male">Teacher</label>
							  <input type="radio"  name="role" value="student"required>
							  <label for="male">Student</label>
							  <input type="radio"  name="role" value="parents" required>
							  <label for="male">Parents</label>
	  
						  </div>
						<input type="submit" name="signup" class="btn btn-outline-light btn-block" value="Sign Up" />
					  </div>
				  </form>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--EXPLORE HEAD SECTION-->
  <section id="about-section">
    <div class="container text-center">
      <div class="py-5">
        <h2 class="display-4">About Us</h2>
        <p class="lead">We are tuition media work for probiding tuition.</p>
        
      </div>
    </div>
  </section>
  <!-- EXPLORE MAIN SECTION -->
  <section id="explore-main-section" class="bg-light text-dark py-5">
    <div class="container">
      <div class="row py-2">
        <div class="col-sm-12 col-lg-6">
          <div >
            <img src="img/explore.jpg" alt="" class="img-fluid rounded">
          </div>
        </div>
        <div class="col-sm-12 col-lg-6">
          <div class="d-flex flex-row">
              <div class="p-4 align-self-start ">
                <i class="fa fa-check"></i>
              </div>
              <div>
                <p class="lead align-self-end px-4 py-2">Take Tuition from parents and students.</p>
              </div>
          </div>
          <div class="d-flex flex-row">
              <div class="p-4 align-self-start ">
                <i class="fa fa-check"></i>
              </div>
              <div>
                <p class="lead align-self-end px-4 py-2">Probide Tuition to tuitors.</p>
              </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--CREATE HEAD SECTION-->
  <section id="service-section" class="bg-primary py-5">
    <div class="container text-center">
        <h2 class="display-4">Service</h2>
		 <p class="lead">Probide service Teacher and Students.</p>
    </div>
  </section>
  <!-- CREATE MAIN SECTION -->
  <section id="create-main-section" class="py-5">
    <div class="container">
      <div class="row py-2">
        <div class="col-sm-12 col-lg-6 pt-2">
          <div class="d-flex flex-row">
              <div class="p-4 align-self-start ">
                <i class="fa fa-check"></i>
              </div>
              <div>
                <p class="lead align-self-end px-4 py-2">Take Tuition from parents and students.</p>
              </div>
          </div>
          <div class="d-flex flex-row">
              <div class="p-4 align-self-start ">
                <i class="fa fa-check"></i>
              </div>
              <div>
                <p class="lead align-self-end px-4 py-2">Probide Tuition to tuitors.</p>
              </div>
          </div>
        </div>
        <div class="col-sm-12 col-lg-6">
          <div >
            <img src="img/create.jpg" alt="" class="img-fluid rounded">
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--SHARE HEAD SECTION-->
  <section id="login-section" class="bg-primary py-5">
    <div class="container text-center">
        <h2 class="display-4">Log in</h2>
        <form class="row" method="post">
        <div class="col-lg-4">
          <div class="form-group mb-0">
            <input type="text" name="username" placeholder="User name" class="form-control form-control-lg" required >
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group my-2 my-md-3 my-lg-0">
            <input type="password" name="password" placeholder="Password" class="form-control form-control-lg" required >
          </div>
        </div>
        <div class="col-lg-4">
          
		  <input type="submit" name="login" class="btn btn-outline-light btn-lg btn-block" value="Log in" />
        </div>
      </form>
    </div>
  </section>
  <section class="bg-light text-dark">
	<div class="container py-5">
		<div class="text-center">
			<b>Contact Us: </b> <br />
			<b>Phone:</b> 0123456789 <br />
			<b>Email:</b> tuitionmedio@gmail.com <br /> 
			House no: 5, Road no: 6 <br />
			Housing State <br />
			Maijdee, Noakhali.
		</div>
	</div>
  </section>
  <!-- footer part -->
  <footer>
    <div class="container py-5">
    <p>Copyright © Tuition Media 2020</p>
	</div>
  </footer>

<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/navbar-fixed.js"></script>
  <script src="js/fontawesome.min.js"></script>
</body>
</html>

<?php
	if(isset($_POST['login'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$username = mysqli_real_escape_string($connection, $username);
	$password = mysqli_real_escape_string($connection, $password);
	
	$query = "SELECT * FROM users WHERE username = '{$username}'";
	$select_user = mysqli_query($connection, $query);
	
	if(!$select_user){
		die("Query Failed " . mysqli_error($connection));
	}
	
	while($row = mysqli_fetch_array($select_user)){
		$db_user_id = $row['id'];	
		echo $db_username = $row['username'];	
		echo $db_password = $row['password'];	
		echo $db_user_role = $row['role'];
		

	}
		
	if($username !== $db_username ||  $password !== $db_password){
		
		header("Location: index.php");
	}
	else {
	$_SESSION['tmuser_id'] = $db_user_id;
	echo $_SESSION['tmusername'] = $db_username;
	echo $_SESSION['tmuser_role'] = $db_user_role;
	
		if($_SESSION['tmuser_role'] == 'teacher'){
			header("Location: teacher/");
		}else{
			header("Location: student/");
		}
	
	}
}

?>
