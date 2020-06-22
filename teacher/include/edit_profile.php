<?php 
	
?>
<h1 class='text-center'>Edit Profile</h1>
  	<hr>
	<form action="" method="post" enctype="multipart/form-data">
	<div class="row">
      <!-- left column -->
      <div class="col-md-4">
        <div class="text-center">
          <img width='150px' src="../<?php echo $image ?>" class="avatar img-circle" alt="avatar">
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
            <label class="col-lg-3 control-label">Education:</label>
            <div class="col-lg-8">
              <input class="form-control" name="phone" type="text" value="<?php echo $education ?>">
            </div>
          </div>
         <div class="form-group">
            <label class="col-lg-3 control-label">Phone no:</label>
            <div class="col-lg-8">
              <input class="form-control" name="phone" type="text" value="<?php echo $phone ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <input class="form-control" name="email" type="text" value="<?php echo $email ?>">
            </div>
          </div>
		  <div class="form-group">
            <label class="col-md-3 control-label">Ability Teaching:</label>
            <div class="col-md-8">
              <textarea class="form-control" name="" id="" rows="5"><?php echo $primary ?> 
Class 9,10 Science Group
Class 11,12 (Physics, Math, ICT)
			  </textarea>
            </div>
          </div>
		  <div class="form-group">
            <label class="col-lg-3 control-label">Address:</label>
            <div class="col-lg-8">
              <input class="form-control" name="address" type="text" value="Housing state, Maijdee, Noakhali">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Password:</label>
            <div class="col-md-8">
              <input name="pass" class="form-control" type="password">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Confirm password:</label>
            <div class="col-md-8">
              <input name="c_pass" class="form-control" type="password">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <input type="submit" name="update" class="btn btn-primary" value="Save Changes">
              <span></span>
              <input type="reset" class="btn btn-default" value="Cancel">
            </div>
          </div>
      </div>
	 </div>
</form>