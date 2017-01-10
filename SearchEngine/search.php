<?php

require_once("./config.php");


// $search_term = "";


$search_term = trim(filter_input(INPUT_POST, "s", FILTER_SANITIZE_STRING));


try{
    $results = $pdo->prepare("
                SELECT *
                FROM level_one
                WHERE name LIKE ?");
    $results->bindValue(1, "%$search_term%", PDO::PARAM_STR);

    $results->execute();
} catch (Exception $e) {
    echo $e;
    exit;
}


$matches = $results->fetchAll(PDO::FETCH_ASSOC);
if ($search_term != "") {



    $members = $matches;

    if (!empty($members)) : ?>
        <div class=" modal-dialog"><fieldset class="field_container" id="memberlist">
        <legend> <img src="../images/arrow.gif"> Results </legend>
        <div id="list_container">
        <liclass="modal-dialog" >
            <?php
            foreach ($members as $member) {
                include("./list/listview.php");
            }
            ?>
        </li>
    <?php else: ?>
        <p class="modal-dialog" id="no"><strong>No results found for this current stage with that name. Try searching in other Levels. </strong></p>
    <?php endif; ?>

    <?php
}
?>
            </div></fieldset>
        </div>
//