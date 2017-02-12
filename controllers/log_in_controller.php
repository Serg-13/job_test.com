<?php 

	include "models/{$view}_model.php";
	
	include "models/main_model.php";

	if(isset($_POST['log_in'])){
		authorization();
		redirect();
	}
	else{
		header("Location: /" );
	}
?>