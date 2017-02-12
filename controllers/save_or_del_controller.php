<?php 
	
	include "main_controller.php";

	include "models/{$view}_model.php";

		if(isset($_POST['save'])){
			save_task();	
		}
		if(isset($_POST['del'])){
			del_task();	
		}

		redirect();

?>