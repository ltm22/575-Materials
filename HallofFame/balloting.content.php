<?php
$db = new Database();

$session = new Session();
$loggedIn = $session->checkLoginStatus();

$caption = 'Career Statistics';
$headers = array('ID', 'Name', 'Position', 'Year', 'Years on Ballot', 'Votes', 'Vote Percentage', 'Inducted?');

$bSql = '
SELECT
	`b`.`id`,
	`p`.`name`,
	`pp`.`position`,
	`b`.`year`,
	`b`.`yearOnBallot`,
	`b`.`votes`,
	`b`.`votePct`,
	`b`.`inducted`
FROM `mostRecentBalloting` AS `b`
LEFT JOIN `players` AS `p`
ON `b`.`player_id` = `p`.`id`
LEFT JOIN `primaryPosition` AS `pp`
ON `pp`.`id` = `b`.`position_id`';

$ballotStats = $db->object('Balloting', $bSql);

$tableRows = array();
$counter = 0;

	foreach ($ballotStats as $ballotStat) {
		// $tableRows .= "<tr>\n";
		/* $tableRows[] = "<tr><td>{$user->id}</td>\n";
		$tableRows[] .= "<td>{$user->firstname}</td>\n";
		$tableRows[] .= "<td>{$user->lastname}</td>\n";
		$tableRows[] .= "<td>{$user->email}</td>\n";
		$tableRows[] .= "<td>{$user->approved}</td>\n";
		if ($loggedIn) {
			$tableRows[] .= "<td><a href=\"user-edit.php?id={$user->id}\" class=\"icon-button\"><i class=\"fas fa-pencil-alt\" role=\"img\" aria-label=\"Edit\"></i></a> ";
			$tableRows[] .= "<a href=\"user-delete.php?id={$user->id}\" class=\"icon-button\"><i class=\"far fa-trash-alt\" id=\"delete-user\" role=\"img\" aria-label=\"Delete\"></i></a></td>\n";
		}
		$tableRows[] .= "</tr>\n"; */

		$tableRows[$counter][] = $ballotStat->id;
		$tableRows[$counter][] = $ballotStat->name;
		$tableRows[$counter][] = $ballotStat->position;
		$tableRows[$counter][] = $ballotStat->year;
		$tableRows[$counter][] = $ballotStat->yearOnBallot;
		$tableRows[$counter][] = $ballotStat->votes;
		$tableRows[$counter][] = $ballotStat->votePct;
		$tableRows[$counter][] = $ballotStat->inducted;
		$counter++;
	}

$data = $tableRows;

$attributes = array('id' => 'ballotTable_id', 'class' => 'ballotTable_class');

include CLASS_PATH . 'UI.class.php'; // if the UI file has not been included yet
$ui = new UI(); // if the UI class has not been called yet;


// $postFirstname = $_POST['firstname'];
// $postLastname = $_POST['lastname'];
// $postEmail = $_POST['email'];

$table = $ui->simpleTable($caption, $headers, $data, $attributes);
echo $table; // this would render a fully complete table
