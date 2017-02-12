<!doctype html>
<html lang="en">
<head>
	
	<meta charset="UTF-8">
	
	<link rel="stylesheet" href="/views/css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
	
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
	<title>Задание</title>

</head>
<body>
	<div id="main">
		<div id = "sidebar">
			<?php include "log_in.php";?>
		</div>
		<div id = "content">
			<?php include "{$view}.php";?>
		</div>
	</div>
</body>
</html>