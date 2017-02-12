<?php
	
	$jawsdb_url = getenv("JAWSDB_URL");

	if ($jawsdb_url) {
		$list = parse_url($jawsdb_url);

		define("DBHOST", $list["host"]);
		define("DBUSER", $list["user"]);
		define("DBPASS", $list["pass"]);
		define("DB", $list["path"]);
		define("DBPORT", $list["port"]);
	}
	else {
		define("DBHOST", "localhost");
		define("DBUSER", "root");
		define("DBPASS", "");
		define("DB", "php_test");
		define("DBPORT", 3306);
	}

	//$connection = @mysqli_connect(DBHOST, DBUSER, DBPASS, DB, DBPORT) or die("Нет соединения с БД");

	$connection = @mysqli_connect(DBHOST, DBUSER, DBPASS, DB, DBPORT);

	echo mysql_errno($link) . ": " . mysql_error($link). "\n";

	mysqli_set_charset($connection, "utf8") or die ("Не установлена кодировка соединения");
?>