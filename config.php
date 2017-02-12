<?php
	
	$jawsdb_url = getenv("JAWSDB_URL");

	if ($jawsdb_url) {
		$list = parse_url($jawsdb_url);

		define("DBHOST", $list["host"]);
		define("DBUSER", $list["user"]);
		define("DBPASS", $list["pass"]);
		define("DB", str_replace("/", "", $list["path"]));
		define("DBPORT", $list["port"]);
	}
	else {
		define("DBHOST", "localhost");
		define("DBUSER", "root");
		define("DBPASS", "");
		define("DB", "php_test");
		define("DBPORT", 3306);
	}

	$connection = @mysqli_connect(DBHOST, DBUSER, DBPASS, DB, DBPORT);

	if (!$connection) {
	    echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
	    echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
	    echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
	    exit;
	}

	mysqli_set_charset($connection, "utf8") or die ("Не установлена кодировка соединения");
?>