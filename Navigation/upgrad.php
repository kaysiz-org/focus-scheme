<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/stylz.css" rel="stylesheet">
<?php



$date = date("l jS \of F Y h:i:s A");

$co = " => ";

$name1 = $_POST['full_name1'];
$phone1 = $_POST['number1'];
$name2 = $_POST['full_name2'];
$phone2 = $_POST['number2'];
$nameexi = $_POST['full_nameexi'];
$phoneexi = $_POST['numberexi'];



include('config.php');
require_once("./process.php");

$existn_memberup = check_level_name2();
foreach ($existn_memberup as $exup2) {

    $level_2_up_name = $exup2['name'];

    /**
     * RETURNS THE NAME OF A MEMBER IN LEVEL 2 WITH THE ID OF 1
     *
     */

}
$existn_member_number2 = check_number2();
foreach ($existn_member_number2 as $exnum2) {

    $numresult2 = $exnum2['ecocash_number'];

    /**
     * RETURNS THE PHONE NUMBER OF A MEMBER IN LEVEL 2 WITH THE ID OF 1
     */

}
$leveb2 = check_level_balance_levele_2();
foreach ($leveb2 as $nab2) {

    $balanc2 = $nab2['balance'];
    /**
     * RETURNS THE CURRENT BALANCE OF A MEMBER IN LEVEL 2 WITH THE ID OF 1
     */

}

    $existn_member3 = check_level_name3();
    foreach ($existn_member3 as $ex3) {

        $level_3_name_result = $ex3['name'];
        /**
         * RETURNS THE NAME OF A MEMBER IN LEVEL 3 WITH THE ID OF 1
         */

    }




    $leveb3 = check_level_balance_level_3();
    foreach ($leveb3 as $nab3) {

        $balanc3 = $nab3['balance'];
        /**
         * RETURNS THE CURRENT BALANCE OF A MEMBER IN LEVEL 3 WITH THE ID OF 1
         */

    }




    $existn_member_number3 = check_number3();
    foreach ($existn_member_number3 as $exnum3) {

        $numresult3 = $exnum3['ecocash_number'];

        /**
         * RETURNS THE PHONE NUMBER OF A MEMBER IN LEVEL 3 WITH THE ID OF 1
         */
}



// adding new member using PDO with try/catch to escape the exceptions


require_once("./process.php");


if (!empty($name1)  && !empty($phone1) &&!empty($name2)  && !empty($phone2) &&!empty($nameexi)
    && !empty($phoneexi) ) {
    try {

        $insert_to_level = $pdo->prepare("INSERT INTO level_one (name, ecocash_number, balance,payers)VALUES (?, ?, 0, ?);");
        $insert_to_level->execute(array($name1, $phone1, $co));
        $insert_to_level->closeCursor();

        $insert_to_me = $pdo->prepare("INSERT INTO member (name, ecocash_number)VALUES (?, ?);");
        $insert_to_me->execute(array($name1, $phone1 ));
        $insert_to_me->closeCursor();

        echo '<p id="listv">' . $name1 . ' Was Added to Level 1  Successfully </p>';
        /** Update reciever`s recieve_balance*/


        $update_reciever_balance = $pdo->prepare("UPDATE level_one SET balance=balance + 10 WHERE name = ?;");
        $update_reciever_balance->execute(array($nameexi));
        $update_reciever_balance->closeCursor();
        $info = " $name paid 10 dollars to $existn_member on $timestamp ";

        echo '<p id="listv"> Updated  ' . $nameexi . ' Balance + $10 </p>';
        //echo "finished ";


        $infoJoin = "$name1 joined on $date and paid 10 dollars";
        $log_info = $pdo->prepare("INSERT INTO member_transact(name, ecocash_number, transact_amount, log, time) VALUES (?, ?, ?, ?, NOW())");
        $log_info->execute(array($name1, $phone1, 10, $infoJoin));
        $log_info->closeCursor();

        /**  CONCARTNET */


    } catch (Exception $e) {
        echo $e;
    };
    try {
        $insert_to_level2 = $pdo->prepare("INSERT INTO level_one (name, ecocash_number, balance,payers)VALUES (?, ?, 0, ?);");
        $insert_to_level2->execute(array($name2, $phone2, $co));
        $insert_to_level2->closeCursor();

        $insert_to_me2 = $pdo->prepare("INSERT INTO member (name, ecocash_number)VALUES (?, ?);");
        $insert_to_me2->execute(array($name2, $phone2 ));
        $insert_to_me2->closeCursor();

        echo '<p id="listv">' . $name2 . ' Was Added to Level 1  Successfully </p>';
        /** Update reciever`s recieve_balance*/


        $update_reciever_balance = $pdo->prepare("UPDATE level_one SET balance=balance + 10 WHERE name = ?;");
        $update_reciever_balance->execute(array($nameexi));
        $update_reciever_balance->closeCursor();

        echo '<p id="listv"> Updated  ' . $nameexi . ' Balance + $10 </p>';
        //echo "finished ";


        $infoJoin = "$name2 joined on $date and paid 10 dollars";
        $log_info = $pdo->prepare("INSERT INTO member_transact(name, ecocash_number, transact_amount, log, time) VALUES (?, ?, ?, ?, NOW())");
        $log_info->execute(array($name2, $phone2, 10, $infoJoin));
        $log_info->closeCursor();


    } catch (Exception $e) {
        echo $e;
    };


    try {
        $insertolevel2 = $pdo->prepare("INSERT INTO level_two(name,  ecocash_number, payers)VALUES (?," . "'" . $phoneexi . "'" . "," . "'" . " => " . "'" . ");");
        $insertolevel2->execute(array($nameexi));
        echo '<p id="listv">' . $nameexi . ' Was Upgraded To Level 2 Successfully</p>';
        echo '<p id="listv">' . $nameexi . ' was awarderd with 5 dollars payout</p>';

        $update_reciever_balance2 = $pdo->prepare("UPDATE level_two SET balance=balance + 15 WHERE id=1;");
        $update_reciever_balance2->execute();

        echo '<p id="listv"> Updated  ' . $level_2_up_name . ' Balance + $15 </p>';
        //CONCAT

        $concart2 = $pdo->prepare(" UPDATE level_two SET payers = CONCAT(payers, ?, ?) WHERE id = 1;");
        $concart2->execute(array($nameexi, $co));
        echo "done";


        $log1 = "$nameexi upgraded to LEVEL TWO on  $date With 15 dollars paid to $level_2_up_name";
        $log_info_level = $pdo->prepare("INSERT INTO member_transact(name, ecocash_number, transact_amount, log, time) VALUES (?, ?, ?, ?, NOW());");
        $log_info_level->execute(array($nameexi, $phoneexi, 15, $log1));
        echo "logeed";


        $deletefromlevel1 = $pdo->prepare("DELETE FROM level_one WHERE name = ?;");
        $deletefromlevel1->execute(array($nameexi));
        echo "deleted";

        $rearrange = $pdo->prepare("ALTER TABLE level_one DROP id;
                      ALTER TABLE level_one AUTO_INCREMENT=1;
                      ALTER TABLE level_one ADD id int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST ;");
        $rearrange->execute();
        echo "reaareged";
        $rearrange->closeCursor();


    } catch (Exception $e) {
        echo $e;
    }
    if ($balanc2 == 45) {
        try {


            $insert_to_level3 = $pdo->prepare("INSERT INTO level_three(name,  ecocash_number, payers)VALUES (?," . "'" . $numresult2 . "'" . "," . "'" . " => " . "'" . ");");
            // var_dump($insert_to_level3);
            $insert_to_level3->execute(array($level_2_up_name));
            $insert_to_level3->closeCursor();

            echo '<p id="listv">' . $level_2_up_name . '  Was Upgraded To Level 3 Successfully </p>';
            echo '<p id="listv">' . $level_2_up_name . '  was awarderd with 10 dollars payout</p>';

            $update_reciever_balance3 = $pdo->prepare("UPDATE level_three SET balance=balance + 50 WHERE id=1;");
            $update_reciever_balance3->execute();
            $update_reciever_balance3->closeCursor();
            echo '<p id="listv"> Updated ' . $level_3_name_result . 'Balance + $15 </p>';

            $concart3 = $pdo->prepare(" UPDATE level_three SET payers = CONCAT(payers, ? ?) WHERE ID = 1");
            $concart3->execute(array($level_2_up_name, $co));
            $concart3->closeCursor();

            $log3 = "$level_2_up_name upgraded to LEVEL THREE on  $date and With 50 dollars paid to $level_3_name_result";
            $log_info_level = $pdo->prepare("INSERT INTO member_transact(name, ecocash_number, transact_amount, log, time) VALUES (?, ?, ?, ?, NOW())");

            $log_info_level->execute(array($level_2_up_name, $numresult2, 50, $log3));
            $log_info_level->closeCursor();
            $delete_from_level2 = $pdo->prepare(" DELETE FROM level_two WHERE id = 1 ");
            $delete_from_level2->execute();

            $rearrange3 = $pdo->prepare("ALTER TABLE level_two DROP id;
                                         ALTER TABLE level_two AUTO_INCREMENT=1;
                                      ALTER TABLE level_two ADD id int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST ;");
            $rearrange3->execute();
            $rearrange3->closeCursor();
        } catch (Exception $e) {
            echo $e;
        };
    } elseif ($balanc3 == 350) {

        try {
            // UPDATE PAYOUT TO 150

            echo '<p id="no">' . $level_3_name_result . ' HAS REACHED STAGE 2 REACHED CONTACT LESTER IMMIDIATLY TO UPGRADE THE SYSTEM</p>';
            $insert_to_stage2_level1 = $pdo->prepare("INSERT INTO stage_two_level_one(name,  ecocash_number, payers)VALUES (?," . "'" . $numresult3 . "'" . "," . "'" . " => " . "'" . ");");
            $insert_to_stage2_level1->execute(array($level_3_name_result));
            $log3 = "$level_2_name_result has reached STAGE 2";
            $log_info_level3 = $pdo->prepare("INSERT INTO member_transact(name, ecocash_number, transact_amount, log, time) VALUES (?, ?, ?, ?, NOW())");
            $log_info_level3->execute(array($level_3_name_result, $numresult3, 200, $log3));

            $delete_from_level3 = $pdo->prepare(" DELETE FROM level_three WHERE id = 1");
            $delete_from_level3->execute();

            $rearrange4 = $pdo->prepare("ALTER TABLE level_three DROP id;
                     ALTER TABLE level_three AUTO_INCREMENT=1;
                     ALTER TABLE level_three ADD id int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST ;");
            $rearrange4->execute();
            $rearrange4->closeCursor();
        } catch (PDOException $e) {
            echo 'PDOException : ' . $e->getMessage();
        }

    }


}