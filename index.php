<?php
	
	include 'config.php';
	
	error_reporting(E_ALL^E_NOTICE);
	
	session_start();

	$routes = array(
		array('url' => '#^$|^\?#', 'view' => 'task'),
		array('url' => '#^logout#', 'view' => 'logout'),
		array('url' => '#^log_in#', 'view' => 'log_in'),
		array('url' => '#^add_task#', 'view' => 'add_task'),
		array('url' => '#^edit/#', 'view' => 'edit'),
		array('url' => '#^save_or_del/#', 'view' => 'save_or_del'),
		array('url' => '#^done/#', 'view' => 'yes_or_no_ done'),
		array('url' => '#^dayside/index.php#', 'view' => 'dayside'),
		array('url' => '#^reg#', 'view' => 'reg')
	);

	$url = ltrim($_SERVER['REQUEST_URI'], '/');
	
	foreach ($routes as $route) {
		if( preg_match($route['url'], $url, $match) ){
			$view = $route['view'];
			break;
		}
	}

	if( empty($match) ){
		include 'views/404.php';
		exit;
	}
	if($view == 'dayside'){
		include 'dayside/index.php';
	}
	else{
		include "controllers/{$view}_controller.php";
	}
?>