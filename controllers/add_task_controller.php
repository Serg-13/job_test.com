<?php 
	
	include "main_controller.php";

	include "models/{$view}_model.php";
	

	if (!isset($_SESSION['cookie']['name'])) {
		include 'views/404.php';
		exit;
	}
	
	else{
		
		if(isset($_POST['submit'])){
			
			load_image();

			if($_SESSION['load']['error'] == 'no'){
				
				$smallimage = 'small_'.time().'_'.$_FILES['image']['name'];
				resizeimg($_SESSION['load']['name'], $smallimage, 320 , 240);
				add_task($smallimage);
				redirect();
			}
		}
		include 'views/main.php';
	}

	
?>