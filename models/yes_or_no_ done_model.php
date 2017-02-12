<?php

	function done_task(){

		$id = $_POST['id_yes'];

		global $connection;

		$query = "UPDATE tasks SET status = 'yes' WHERE id = '$id'";

		$res = mysqli_query($connection, $query);
	}
	function no_done_task(){

		$id = $_POST['id_no'];

		global $connection;

		$query = "UPDATE tasks SET status = 'no' WHERE id = '$id'";

		$res = mysqli_query($connection, $query);
	}

?>