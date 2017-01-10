<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/stylz.css" rel="stylesheet">
<?php

$date = date("l jS \of F Y h:i:s A");

$co = " => ";

$name = $_POST['full_name'];
$phone = $_POST['email'];


		try {
			include('config.php');

// adding new member using PDO with try/catch to escape the exceptions


			require_once("./process.php");


			$existn_member = check_level_name();
			foreach ($existn_member as $ex) {

				$level_name_result = $ex['name'];
				/**
				 * RETURNS THE NAME OF A MEMBER IN LEVEL 1 WITH THE ID OF 1
				 */

			}
			$existn_member2 = check_level_name2();
			foreach ($existn_member2 as $ex2) {

				$level_2_name_result = $ex2['name'];

				/**
				 * RETURNS THE NAME OF A MEMBER IN LEVEL 2 WITH THE ID OF 1
				 */
			}
			$existn_member3 = check_level_name3();
			foreach ($existn_member3 as $ex3) {

				$level_3_name_result = $ex3['name'];
				/**
				 * RETURNS THE NAME OF A MEMBER IN LEVEL 3 WITH THE ID OF 1
				 */

			}


			$leveb = check_level_balance();
			foreach ($leveb as $nab) {

				$balanc = $nab['balance'];

				/**
				 * RETURNS THE CURRENT BALANCE OF A MEMBER IN LEVEL 1 WITH THE ID OF 1
				 */

			}
			$leveb2 = check_level_balance_levele_2();
			foreach ($leveb2 as $nab2) {

				$balanc2 = $nab2['balance'];
				/**
				 * RETURNS THE CURRENT BALANCE OF A MEMBER IN LEVEL 2 WITH THE ID OF 1
				 */

			}

			$leveb3 = check_level_balance_level_3();
			foreach ($leveb3 as $nab3) {

				$balanc3 = $nab3['balance'];
				/**
				 * RETURNS THE CURRENT BALANCE OF A MEMBER IN LEVEL 3 WITH THE ID OF 1
				 */

			}

			$existn_member_number = check_number();
			foreach ($existn_member_number as $exnum) {

				$numresult = $exnum['ecocash_number'];
				/**
				 * RETURNS THE PHONE NUMBER OF A MEMBER IN LEVEL 1 WITH THE ID OF 1
				 */

			}
			$existn_member_number2 = check_number2();
			foreach ($existn_member_number2 as $exnum2) {

				$numresult2 = $exnum2['ecocash_number'];

				/**
				 * RETURNS THE PHONE NUMBER OF A MEMBER IN LEVEL 2 WITH THE ID OF 1
				 */

			}

			$existn_member_number3 = check_number3();
			foreach ($existn_member_number3 as $exnum3) {

				$numresult3 = $exnum3['ecocash_number'];

				/**
				 * RETURNS THE PHONE NUMBER OF A MEMBER IN LEVEL 3 WITH THE ID OF 1
				 */

			}
		}catch (Exception $e) {
			echo $e;
		};


			if (!empty($name)  && !empty($phone) ) {
				try {

					$insert_to_m = $pdo->prepare("INSERT INTO member (name, ecocash_number)VALUES (?, ?);");
					$insert_to_m->execute(array($name, $phone));
					$insert_to_m->closeCursor();

					echo '<p id="listv">' . $name . ' Was Added to Members  Successfully </p>';
					/** Update reciever`s recieve_balance*/
					$insert_to_level = $pdo->prepare("INSERT INTO level_one (name, ecocash_number, balance,payers)VALUES (?, ?, 0, ?);");
					$insert_to_level->execute(array($name, $phone, $co));
					$insert_to_level->closeCursor();

					echo '<p id="listv">' . $name . ' Was Added to Level 1  Successfully </p>';
					/** Update reciever`s recieve_balance*/


					$update_reciever_balance = $pdo->prepare("UPDATE level_one SET balance=balance + 10 WHERE id=1;");
					$update_reciever_balance->execute();
					$update_reciever_balance->closeCursor();
					/** Log $info = " $name paid 10 dollars to $existn_member on $timestamp ";*/

					echo '<p id="listv"> Updated  ' . $level_name_result . ' Balance + $10 </p>';
					//echo "finished ";


					$infoJoin = "$name joined on $date and paid 10 dollars";
					$log_info = $pdo->prepare("INSERT INTO member_transact(name, ecocash_number, transact_amount, log, time) VALUES (?, ?, ?, ?, NOW())");
					$log_info->execute(array($name, $phone, 10, $infoJoin));
					$log_info->closeCursor();

					/**  CONCARTNET */
					$concart = $pdo->prepare(" UPDATE level_one SET payers = CONCAT(payers, ? ?) WHERE ID =1;");
					$concart->execute(array($name, $co));
					$concart->closeCursor();

				} catch (Exception $e) {
					echo $e;
				};


				if ($balanc == 10) {

					try {
						$insertolevel2 = $pdo->prepare("INSERT INTO level_two(name,  ecocash_number, payers)VALUES (?," . "'" . $numresult . "'" . "," . "'" . " => " . "'" . ");");
						$insertolevel2->execute(array($level_name_result));
						echo '<p id="listv">' . $level_name_result . ' Was Upgraded To Level 2 Successfully</p>';
						echo '<p id="listv">' . $level_name_result . ' was awarderd with 5 dollars payout</p>';

						$update_reciever_balance2 = $pdo->prepare("UPDATE level_two SET balance=balance + 15 WHERE id=1;");
						$update_reciever_balance2->execute();

						echo '<p id="listv"> Updated  ' . $level_2_name_result . ' Balance + $15 </p>';
						//CONCAT
						$concart2 = $pdo->prepare(" UPDATE level_two SET payers = CONCAT(payers, ? ?) WHERE id =1");
						$concart2->execute(array($level_name_result, $co));


						$log1 = "$level_name_result upgraded to LEVEL TWO on  $date With 15 dollars paid to $level_2_name_result";
						$log_info_level = $pdo->prepare("INSERT INTO member_transact(name, ecocash_number, transact_amount, log, time) VALUES (?, ?, ?, ?, NOW())");
						$log_info_level->execute(array($level_name_result, $numresult, 15, $log1));


						$deletefromlevel1 = $pdo->prepare("DELETE FROM level_one WHERE id = 1");
						$deletefromlevel1->execute();

						$rearrange = $pdo->prepare("ALTER TABLE level_one DROP id;
                      ALTER TABLE level_one AUTO_INCREMENT=1;
                      ALTER TABLE level_one ADD id int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST ;");
						$rearrange->execute();
						$rearrange->closeCursor();


					} catch (Exception $e) {
						echo $e;
					};

				} elseif ($balanc2 == 45) {
					try {


						$insert_to_level3 = $pdo->prepare("INSERT INTO level_three(name,  ecocash_number, payers)VALUES (?," . "'" . $numresult2 . "'" . "," . "'" . " => " . "'" . ");");
						// var_dump($insert_to_level3);
						$insert_to_level3->execute(array($level_2_name_result));
						$insert_to_level3->closeCursor();

						echo '<p id="listv">' . $level_2_name_result . '  Was Upgraded To Level 3 Successfully </p>';
						echo '<p id="listv">' . $level_2_name_result . '  was awarderd with 10 dollars payout</p>';

						$update_reciever_balance3 = $pdo->prepare("UPDATE level_three SET balance=balance + 50 WHERE id=1;");
						$update_reciever_balance3->execute();
						$update_reciever_balance3->closeCursor();
						echo '<p id="listv"> Updated ' . $level_3_name_result . 'Balance + $15 </p>';

						$concart3 = $pdo->prepare(" UPDATE level_three SET payers = CONCAT(payers, ? ?) WHERE ID = 1");
						$concart3->execute(array($level_2_name_result, $co));
						$concart3->closeCursor();

						$log3 = "$level_2_name_result upgraded to LEVEL THREE on  $date and With 50 dollars paid to $level_3_name_result";
						$log_info_level = $pdo->prepare("INSERT INTO member_transact(name, ecocash_number, transact_amount, log, time) VALUES (?, ?, ?, ?, NOW())");

						$log_info_level->execute(array($level_2_name_result, $numresult2, 50, $log3));
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
				include("list_membersall.php");

// list_members : this file displays the list of members in a table view


			}
