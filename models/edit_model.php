<?php 

	function edit_task(){

		global $connection;
		
		if(isset($_POST['id'])){
			
			$_SESSION['edit']['id'] = $_POST['id'];
		
		}
		$id = $_SESSION['edit']['id'];

		$query = "SELECT tasks.*, users.name FROM tasks, users WHERE tasks.id_user = users.id AND tasks.id = '$id'";

		$res = execute_mysqli_query($connection, $query);

		return $row = mysqli_fetch_assoc($res);
		}
	

?>