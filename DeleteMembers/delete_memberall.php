<?php
/*
* Author : Ali Aboussebaba
* Email : bewebdeveloper@gmail.com
* Website : http://www.bewebdeveloper.com
* Subject : Using Ajax with PHP/MySQL
*/

include('config.php');

// deleting a member using PDO with try/catch to escape the exceptions
try {
	$sql = "DELETE FROM member WHERE id = :id";
	$query = $pdo->prepare($sql);
	$query->bindParam(':id', $_POST['id'], PDO::PARAM_INT);
	$query->execute();
	$rearrange3 = $pdo->prepare("ALTER TABLE member DROP id;
                                         ALTER TABLE member AUTO_INCREMENT=1;
                                      ALTER TABLE member ADD id int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST ;");
	$rearrange3->execute();
} catch (PDOException $e) {
	echo 'PDOException : '.  $e->getMessage();
}

// list_members : this file displays the list of members in a table view
include('list_membersall.php');
?>