<?php 

	function conclusion_task(){

		global $connection;

		if ($_POST['sort'] == 't2') {
			$query = "SELECT tasks.*, users.name, users.email FROM tasks, users WHERE tasks.id_user = users.id ORDER BY status DESC";
			$_SESSION['sort']['selt'] = $_POST['sort'];
		}
		if ($_POST['sort'] == 't3') {
			$query = "SELECT tasks.*, users.name, users.email FROM tasks, users WHERE tasks.id_user = users.id ORDER BY status";
			$_SESSION['sort']['selt'] = $_POST['sort'];
		}
		if ($_POST['sort'] == 't4') {
			$query = "SELECT tasks.*, users.name, users.email FROM tasks, users WHERE tasks.id_user = users.id ORDER BY name";
			$_SESSION['sort']['selt'] = $_POST['sort'];
		}
		if ($_POST['sort'] == 't5') {
			$query = "SELECT tasks.*, users.name, users.email FROM tasks, users WHERE tasks.id_user = users.id ORDER BY email";
			$_SESSION['sort']['selt'] = $_POST['sort'];
		}
		if(!isset($_POST['sort']) or $_POST['sort'] == 't1'){
			$query = "SELECT tasks.*, users.name, users.email FROM tasks, users WHERE tasks.id_user = users.id";
		}
		$res = execute_mysqli_query($connection, $query);
		
		$tasks_info = array();

		while ($row = mysqli_fetch_assoc($res)) {
			$tasks_info[] = $row;
		}
		
		return $tasks_info;
	}

?>