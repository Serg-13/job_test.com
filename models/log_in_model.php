<?php

	function authorization(){
		
		global $connection;
		
		$login = trim(mysqli_real_escape_string($connection, $_POST['login']));
		$password = trim($_POST['password']);

		if( empty($login) or empty($password)){
			$_SESSION['auth']['errors'] = 'Поля логин/пароль обязательны к заполнению';
		}
		else{
			$password = md5($password);
			$query = "SELECT login, hash, name, access FROM users 
						WHERE login = '$login' AND password = '$password'
						Limit 1";
			
			$res = execute_mysqli_query($connection, $query);

			if(mysqli_num_rows($res) == 1){
				
				$row = mysqli_fetch_assoc($res);
				
				setcookie("login", $row['login'], time()+3600*24*14);
				setcookie("hash", $row['hash'], time()+3600*24*14);

				$_SESSION['cookie']['access'] = $row['access'];
				$_SESSION['cookie']['name'] = $row['name'];

			}
			else{
				$_SESSION['auth']['errors'] = 'Логин/пароль введены неверно';
			}
		}
	}
	
	



?>