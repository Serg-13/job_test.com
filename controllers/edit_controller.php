<?php 
	
	include "main_controller.php";

	include "models/{$view}_model.php";

	edit_task();

	include "views/main.php";
?>