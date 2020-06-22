<div class="container emp-profile">
	<form method="post">
		<div class="row">
			<div class="col-md-4">
				<div class="profile-img">
					<img src="../<?php echo $image ?>".jpg" alt=""/>
				</div>
					<input class="profile-edit-btn mt-2" type="button" name="btnAddMore" value="Edit Profile" style="margin-left:30px;" onclick="location.href='profile.php?source=edit_profile'">
			</div>
			<div class="col-md-8">
				<div class="profile-head">
							<h5>
								<?php echo $name ?>
							</h5>
							<h6>
								Teacher
							</h6>						   
					<ul class="nav nav-tabs" id="myTab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
						</li>   
					</ul>
				</div>
				<div class="row">
					<div class="col-md-6">
						<label>Education</label>
					</div>
					<div class="col-md-6">
						<p><?php echo $education ?></p>
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
						<label>Ability Teaching</label>
					</div>
					<div class="col-md-6">
						<p><?php if(!empty($primary)){echo "Class ".$primary;} ?> <?php if(!empty($secondary)) {echo "<br />Class 9/10 ". $secondary; }?>  <?php if(!empty($college)){ echo "<br />Class 11/12 ".$college; }?> <?php if(!empty($honours)){ echo "<br /> Honours ".$honours; }?></p>
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