<?php
	
	function save_task(){

		global $connection;

		$id = $_SESSION['edit']['id'];
		
		$task = $_POST['task'];

		$query = "UPDATE tasks SET task = '$task' WHERE id = '$id'";

		$res = mysqli_query($connection, $query);

		$id = $_SESSION['edit']['success'] = 'Задание обновлено';

	}

	function del_task(){

		global $connection;

		$id = $_SESSION['edit']['id'];

		$query = "DELETE FROM tasks WHERE id='$id'";

		$res = mysqli_query($connection, $query);

		$id = $_SESSION['edit']['success'] = 'Задание удалено';

	}
?>