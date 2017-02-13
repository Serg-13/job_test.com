<?php
	
	function save_task(){

		global $connection;

		$id = $_POST['save'];
		
		$task = $_POST['task'];

		$query = "UPDATE tasks SET task = '$task' WHERE id = '$id'";

		$res = execute_mysqli_query($connection, $query);

		$id = $_SESSION['edit']['success'] = 'Задание обновлено';

	}

	function del_task(){

		global $connection;

		$id = $_POST['del'];

		$query = "SELECT name_image FROM tasks WHERE id = '$id'";

		$res = mysqli_query($connection, $query);

		print_r($row = mysqli_fetch_assoc($res));

		unlink('views/img/task_img/'.$row['name_image']);

		$query = "DELETE FROM tasks WHERE id='$id'";

		$res = execute_mysqli_query($connection, $query);

		$_SESSION['edit']['success'] = 'Задание удалено';

	}
?>