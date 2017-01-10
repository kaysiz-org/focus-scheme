<?php
/*
* Author : Ali Aboussebaba
* Email : bewebdeveloper@gmail.com
* Website : http://www.bewebdeveloper.com
* Subject : Using Ajax with PHP/MySQL
*/

/* PDO connect *********
function connect() {
	$host = 'localhost';
	$db_name = 'focus_scheme';
	$db_user = 'focusAdmin';
	$db_password = 'yes';
    return new PDO('mysql:host='.$host.';dbname='.$db_name, $db_user, $db_password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}
*/

try {
	$pdo = new PDO("mysql:host=localhost;dbname=focus_scheme;port=3306", "focusAdmin","yes");

	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$pdo->exec("SET NAMES utf8");

}

catch (Exception $e) {
	echo $e->getMessage();
	exit;
}

?>