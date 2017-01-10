<?php
include("config.php");
$keyword = '%'.$_POST['keyword'].'%';
$sql = "SELECT * FROM level_one WHERE name LIKE (:keyword) ORDER BY id ASC LIMIT 0, 10";

$query = $pdo->prepare($sql);
$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
$query->execute();
$list = $query->fetchAll();
echo'<h6>Suggestions</h6>';
foreach ($list as $rs) {
    // put in bold the written text
    $aname = str_replace($_POST['keyword'], '<b>'.$_POST['keyword'].'</b>', $rs['name']);

    // add new option
    echo '<li onclick="set_item(\''.str_replace("'", "\'", $rs['name']).'\')">'.$aname.'</li>';
}