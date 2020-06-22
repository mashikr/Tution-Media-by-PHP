<?php include "include/header.php" ?>
<?php include "include/navbar.php" ?>
	<?php
		if(isset($_GET['source'])){
			$source = $_GET['source'];
		}
		else{
			$source = '';
		}
		switch($source){
			case 'edit_profile';
			include "include/edit_profile.php";
			break;
			
			default:
			include "include/profile_view.php";
			break;
		}
	?> 
<?php include "include/footer.php" ?>