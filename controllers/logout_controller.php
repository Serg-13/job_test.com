<?php
	
	include "models/main_model.php";
	
	setcookie("login","", time()-3600*24*14);
   	setcookie("hash","", time()-3600*24*14);
   	unset($_SESSION['cookie']);
   
   	redirect();

?>