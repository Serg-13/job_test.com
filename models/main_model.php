<?php
	
	function redirect(){
		$redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER']
			: '/' ;
			header("Location: $redirect" );
			exit;
	}

	function execute_mysqli_query($connection, $query){  
  		
  		$res = mysqli_query($connection, $query);

  		if (!$res) { 
    		print_r(mysqli_error($connection));
    		exit();  
  		}
  		else{
  			return $res;
  		} 
	}

	function inspection_cookie(){
		
		global $connection;

		$login =$_COOKIE['login'];
		$hash =$_COOKIE['hash'];

		if(empty($login) or empty($hash)){
			$_SESSION['cookie']['errors'] = 'yes';
		}
		else{

			$query = "SELECT login, hash, access, name FROM usrs 
						WHERE logn = '$login' AND hash = '$hash'
						Limit 1";
			
			$res = execute_mysqli_query($connection, $query);

			if(mysqli_num_rows($res) == 1){
				
				$row = mysqli_fetch_assoc($res);
				
				$_SESSION['cookie']['access'] = $row['access'];
				$_SESSION['cookie']['name'] = $row['name'];
			}
			else{
				$_SESSION['cookie']['errors'] = 'yes';
			}
		}
	}
	

?>