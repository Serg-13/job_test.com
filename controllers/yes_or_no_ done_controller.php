<?php
	
	include "models/{$view}_model.php";
	
	include "main_controller.php";

	if(isset($_POST['id_yes'])){
		done_task();	
	}
	if(isset($_POST['id_no'])){
		no_done_task();	
	}

	redirect();

?>
