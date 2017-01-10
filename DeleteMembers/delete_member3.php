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
	$sql = "DELETE FROM level_three WHERE id = :id";
	$query = $pdo->prepare($sql);
	$query->bindParam(':id', $_POST['id'], PDO::PARAM_INT);
	$query->execute();
	$rearrange3 = $pdo->prepare("ALTER TABLE level_three DROP id;
                                         ALTER TABLE level_three AUTO_INCREMENT=1;
                                      ALTER TABLE level_three ADD id int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST ;");
	$rearrange3->execute();
} catch (PDOException $e) {
	echo 'PDOException : '.  $e->getMessage();
}

// list_members : this file displays the list of members in a table view
include('list_members3.php');
?>