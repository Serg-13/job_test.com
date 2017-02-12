<?php
	
	$jawsdb_url = getenv("JAWSDB_URL");

echo $jawsdb_url;

	if ($jawsdb_url) {
		$list = parse_url($jawsdb_url);

		define("DBHOST", $list["host"]);
		define("DBUSER", $list["user"]);
		define("DBPASS", $list["pass"]);
		define("DB", $list["path"]);
	}
	else {
		define("DBHOST", "localhost");
		define("DBUSER", "root");
		define("DBPASS", "");
		define("DB", "php_test");
	}

	$connection = @mysqli_connect(DBHOST, DBUSER, DBPASS, DB) or die("Нет соединения с БД");

	mysqli_set_charset($connection, "utf8") or die ("Не установлена кодировка соединения");
?>