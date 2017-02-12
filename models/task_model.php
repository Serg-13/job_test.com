<?php 

	function conclusion_task(){

		global $connection;

		$query = "SELECT tasks.*, users.name FROM tasks, users WHERE tasks.id_user = users.id";

		$res = mysqli_query($connection, $query);
		
		$tasks_info = array();

		while ($row = mysqli_fetch_assoc($res)) {
			$tasks_info[] = $row;
		}
		return $tasks_info;
	}

?>