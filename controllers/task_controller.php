<?php 
	
	include "main_controller.php";

	include "models/{$view}_model.php";

		$tasks = conclusion_task();
	
	include "views/main.php";

?>