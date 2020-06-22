<div class="container emp-profile">
	<form method="post">
		<div class="row">
			<div class="col-md-4">
				<div class="profile-img">
					<img src="../<?php echo $image ?>" alt=""/>
				</div>
					<input class="profile-edit-btn mt-2" type="button" name="btnAddMore" value="Edit Profile" style="margin-left:30px;" onclick="location.href='profile.php?source=edit_profile'">
			</div>
			<div class="col-md-8">
				<div class="profile-head">
							<h5><?php echo $name ?></h5>
							<h6><?php 
									if($_SESSION['tmuser_role'] == 'student'){
										echo "Student";
									} 
									else{
										echo "Parents";
									}
								?>
							</h6>						   
					<ul class="nav nav-tabs" id="myTab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
						</li>   
					</ul>
				</div>
				 <div class="row">
					<div class="col-md-6">
						<label>Student Username</label>
					</div>
					<div class="col-md-6">
						<p><?php echo $_SESSION['tmusername'] ?></p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<?php if($_SESSION['tmuser_role'] == 'student'){ ?>
							<label>Class:</label>
						<?php } else {?>
							<label>Profession:</label>
						<?php } ?>
					</div>
					<div class="col-md-6">
						<p><?php echo $profession ?></p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<label>Phone</label>
					</div>
					<div class="col-md-6">
						<p><?php echo $phone ?></p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<label>Email</label>
					</div>
					<div class="col-md-6">
						<p><?php echo $email ?></p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<label>Address</label>
					</div>
					<div class="col-md-6">
						<p><?php echo $address ?></p>
					</div>
				</div>
			</div>
		</div>
	</form> 
</div>