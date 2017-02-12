<?php
	
	include "models/{$view}_model.php";
	
	include "main_controller.php";

	if(isset($_POST['val'])){
		echo access_field();
		exit;
	}

	if(isset($_POST['reg'])){
		registration();
	}

	include "views/main.php";

?>