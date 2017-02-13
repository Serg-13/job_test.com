<?php
		
	function access_field(){
		
		global $connection;
		
		$fields = array('login', 'email');
		$val = trim(mysqli_real_escape_string($connection, $_POST['val']));
		$field = $_POST['dataField'];

		if(!in_array($field, $fields)){
			return 'no';
		}

		$query = "SELECT id FROM users WHERE $field = '$val'";
		
		$res = execute_mysqli_query($connection, $query);

		if(mysqli_num_rows($res) > 0){
			return "no"; 
		}
		else{
			return "yes";
		}
	}

	function registration(){
		
		global $connection;
		
		$errors = '';
		$fields = array('login'=>'Логин', 'email'=>'Email');
		$login = trim($_POST['login_reg']);
		$password = trim($_POST['password_reg']);
		$name = trim($_POST['name_reg']);
		$email = trim($_POST['email_reg']);
		$post =  array($login, $password);

		if(empty($login)) $errors .= '<li>Не указан Логин</li>';
		if(empty($password)) $errors .= '<li>Не указан Пароль</li>';
		if(empty($name)) $errors .= '<li>Не указан Имя</li>';
		if(empty($email)) $errors .= '<li>Не указан Еmail</li>';
		if(!empty($errors)){
			$_SESSION['reg']['errors'] = "Не заполненые обязательные поля: <ul>{$errors}</ul>";
			return;
		}

		$login = mysqli_real_escape_string($connection, $login);
		$password = md5($password);
		$name = mysqli_real_escape_string($connection, $name);
		$email = mysqli_real_escape_string($connection, $email);

		$query =  "SELECT login, email FROM users WHERE login = '$login' OR email = '$email'";

		$res = execute_mysqli_query($connection, $query);

		if(mysqli_num_rows($res) > 0){
			 
			$data = array();

			while($row = mysqli_fetch_assoc($res)) {
				$data = array_intersect($row, $post);
				foreach($data as $key => $val) {
					$k[$key] = $key;
				}
			}
			foreach ($k as $key => $val) {
				$errors .= "<li>{$fields[$key]}</li>";
			}
			$_SESSION['reg']['errors'] = "Выберите другие значения: <ul>{$errors}</ul>";
			return;
		}

		$hash = md5(rand(0, 9999999999));
		
		if($login == 'admin'){
			$access = 'admin';
		}
		else{
			$access = 'client';
		}

		$query = "INSERT INTO users (login, password, email, name, hash, access) 
					VALUES ('$login', '$password', '$email', '$name', '$hash', '$access')";
		
		$res = mysqli_query($connection, $query);

		$res = execute_mysqli_query($connection, $query);

		if (mysqli_affected_rows($connection) > 0) {
			
			$_SESSION['reg']['success'] = "Регистрация прошла успешно";

			setcookie("login", stripcslashes($login), time()+3600*24*14);
			setcookie("hash", $hash, time()+3600*24*14);
		}
	}


?>