

<?php
require('config.php');

function check_number2()
{


    require('config.php');
    try {

        $results = $pdo->prepare("
               SELECT ecocash_number FROM level_two WHERE  id = 1");


        $results->execute();




    } catch (Exception $e) {
        echo $e;
        exit;
    }

    $matches = $results->fetchAll(PDO::FETCH_ASSOC);

    return $matches;
}

function check_number3()
{


    require('config.php');
    try {

        $results = $pdo->prepare("
               SELECT ecocash_number FROM level_three WHERE  id= 1");

        // $results ->bindValue(1,$n,PDO::PARAM_STR);
        $results->execute();



        // $results->execute();
    } catch (Exception $e) {
        echo $e;
        exit;
    }

    $matches = $results->fetchAll(PDO::FETCH_ASSOC);

    return $matches;
}
function check_number()
{


    require('config.php');
    try {

        $results = $pdo->prepare("
               SELECT ecocash_number FROM level_one WHERE  id= 1");

        // $results ->bindValue(1,$n,PDO::PARAM_STR);
        $results->execute();



        // $results->execute();
    } catch (Exception $e) {
        echo $e;
        exit;
    }

    $matches = $results->fetchAll(PDO::FETCH_ASSOC);

    return $matches;
}

function check_level_name()
{


    require('config.php');
    try {

        $results = $pdo->prepare("
               SELECT name FROM level_one WHERE  id= 1");

        // $results ->bindValue(1,$n,PDO::PARAM_STR);
        $results->execute();



        // $results->execute();
    } catch (Exception $e) {
        echo $e;
        exit;
    }

    $matches = $results->fetchAll(PDO::FETCH_ASSOC);

    return $matches;
}

function check_level_name2()
{


    require('config.php');
    try {

        $results = $pdo->prepare("
               SELECT name FROM level_two WHERE  id= 1");

        // $results ->bindValue(1,$n,PDO::PARAM_STR);
        $results->execute();



        // $results->execute();
    } catch (Exception $e) {
        echo $e;
        exit;
    }

    $matches = $results->fetchAll(PDO::FETCH_ASSOC);

    return $matches;
}
function check_level_name3()
{


    require('config.php');
    try {

        $results = $pdo->prepare("
               SELECT name FROM level_three WHERE  id= 1");

        // $results ->bindValue(1,$n,PDO::PARAM_STR);
        $results->execute();



        // $results->execute();
    } catch (Exception $e) {
        echo $e;
        exit;
    }

    $matches = $results->fetchAll(PDO::FETCH_ASSOC);

    return $matches;
}


function check_level_balance()
{


    require('config.php');
    try {

        $results = $pdo->prepare("
               SELECT balance FROM level_one WHERE  id= 1");

        // $results ->bindValue(1,$n,PDO::PARAM_STR);
        $results->execute();



        // $results->execute();
    } catch (Exception $e) {
        echo $e;
        exit;
    }

    $matches = $results->fetchAll(PDO::FETCH_ASSOC);

    return $matches;
}

function check_level_balance_levele_2()
{


    require('config.php');
    try {

        $results = $pdo->prepare("
               SELECT balance FROM level_two WHERE  id= 1");

        // $results ->bindValue(1,$n,PDO::PARAM_STR);
        $results->execute();



        // $results->execute();
    } catch (Exception $e) {
        echo $e;
        exit;
    }

    $matches = $results->fetchAll(PDO::FETCH_ASSOC);

    return $matches;
}

function check_level_balance_level_3()
{


    require('config.php');
    try {

        $results = $pdo->prepare("
               SELECT balance FROM level_three WHERE  id= 1");

        // $results ->bindValue(1,$n,PDO::PARAM_STR);
        $results->execute();



        // $results->execute();
    } catch (Exception $e) {
        echo $e;
        exit;
    }

    $matches = $results->fetchAll(PDO::FETCH_ASSOC);

    return $matches;
}

function get_members_1() {

    require( "./inc/database.php");

    try {
        $results = $pdo->prepare("SELECT * FROM level_  ORDER BY id ASC");
        $results->execute();    } catch (Exception $e) {
        echo "Data could not be retrieved from the database.";
        exit;
    }

    $members = $results->fetchAll(PDO::FETCH_ASSOC);

    return $members;
}
function get_members_all() {

    require( "./inc/database.php");

    try {
        $results = $pdo->prepare("SELECT * FROM member  ORDER BY id ASC");
        $results->execute();    } catch (Exception $e) {
        echo "Data could not be retrieved from the database.";
        exit;
    }

    $members = $results->fetchAll(PDO::FETCH_ASSOC);

    return $members;
}
function get_members_2() {

    require( "./inc/database.php");

    try {
        $results = $pdo->prepare("SELECT * FROM level_two  ORDER BY id ASC");
        $results->execute();    } catch (Exception $e) {
        echo "Data could not be retrieved from the database.";
        exit;
    }

    $members = $results->fetchAll(PDO::FETCH_ASSOC);

    return $members;
}
function get_members_3() {

    require( "./inc/database.php");

    try {
        $results = $pdo->prepare("SELECT * FROM level_three  ORDER BY id ASC");
        $results->execute();    }
    catch (Exception $e) {
        echo "Data could not be retrieved from the database.";
        exit;
    }

    $members = $results->fetchAll(PDO::FETCH_ASSOC);

    return $members;
}
function logi() {

    require( "./inc/database.php");

    try {
        $results = $pdo->prepare("SELECT * FROM member_transact  ORDER BY time");
        $results->execute();    } catch (Exception $e) {
        echo "Data could not be retrieved from the database.";
        exit;
    }

    $members = $results->fetchAll(PDO::FETCH_ASSOC);

    return $members;
}




