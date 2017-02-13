<?php
	
	function load_image(){
		
		$formats = array("image/jpeg", "image/gif", "image/png");
		$format = $_FILES['image']['type'];

		if(in_array($format, $formats)){
			
			if(is_uploaded_file($_FILES['image']['tmp_name'])){
				$dir = "views/img/task_img/".rand(0,999999)."_".time().$_FILES['image']['name'];
				if(move_uploaded_file($_FILES['image']['tmp_name'], $dir)){
					$_SESSION['load']['error'] = 'no';
					$_SESSION['load']['name'] = $dir;
				}
				else{
					$_SESSION['load']['error'] = 'Ошибка при загрузке картинки';
				}
			}
		}
		else{
			$_SESSION['load']['error'] = 'Выберите другой формат';
		}
	}

	function resizeimg($filename, $smallimage, $w, $h){ 
  
	    $smallimage = "views/img/task_img/".$smallimage;     
	    $ratio = $w/$h; 
	    
	    $size_img = getimagesize($filename); 

	    if (($size_img[0]<$w) && ($size_img[1]<$h)) return true; 

	    $src_ratio=$size_img[0]/$size_img[1]; 

		if ($ratio<$src_ratio) { 
	  		$h = $w/$src_ratio; 
	    } 
	    else 
	    { 
	     	$w = $h*$src_ratio; 
	    } 

	    $dest_img = imagecreatetruecolor($w, $h);   
	    $white = imagecolorallocate($dest_img, 255, 255, 255);        
	    
	    if ($size_img[2]==2)  $src_img = imagecreatefromjpeg($filename);                       
	    else if ($size_img[2]==1) $src_img = imagecreatefromgif($filename);                       
	    else if ($size_img[2]==3) $src_img = imagecreatefrompng($filename);  

	    imagecopyresampled($dest_img, $src_img, 0, 0, 0, 0, $w, $h, $size_img[0], $size_img[1]);                 

	    if ($size_img[2]==2)  imagejpeg($dest_img, $smallimage);                       
	    else if ($size_img[2]==1) imagegif($dest_img, $smallimage);                       
	    else if ($size_img[2]==3) imagepng($dest_img, $smallimage);  

	    imagedestroy($dest_img); 
	    imagedestroy($src_img); 

	    unlink($filename);

	    return true;
	         
 	}  

 	function add_task($smallimage){

 		global $connection;

 		$task = trim($_POST['area']);
 		
 		$login = $_COOKIE['login'];

 		$query =  "SELECT id FROM users WHERE login = '$login'";

 		$res = execute_mysqli_query($connection, $query);

 		$row = mysqli_fetch_assoc($res);
 		
 		$id = $row['id'];
 		
 		if($id > 0 ){
 			$query = "INSERT INTO tasks (id_user, task, status, name_image) 
						VALUES ('$id', '$task', 'no', '$smallimage')";
		}

		$res = execute_mysqli_query($connection, $query);

		if (mysqli_affected_rows($connection) > 0) {
			
			$_SESSION['load']['success'] = "Регистрация прошла успешно";
		}

 	}
?>