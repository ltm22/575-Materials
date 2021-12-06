<?php
$db = new Database();

$session = new Session();
$loggedIn = $session->checkLoginStatus();

// $loggedIn = 1;

$caption = 'Career Statistics';
$headers = array('ID', 'Name', 'Position', 'Years Played', 'WAR', 'WAR7', 'JAWS', 'JPos');

$cSql = '
SELECT
	`ps`.`id`,
	`p`.`name`,
	`pp`.`position`,
	`ps`.`yearsPlayed`,
	`ps`.`WAR`,
	`ps`.`WAR7`,
	`ps`.`JAWS`,
	`ps`.`JPos`
FROM `performanceStats` AS `ps`
LEFT JOIN `players` AS `p`
ON `ps`.`player_id` = `p`.`id`
LEFT JOIN `primaryPosition` AS `pp`
ON `pp`.`id` = `ps`.`position_id`
ORDER BY `ps`.`player_id`';

$performanceStats = $db->object('Career', $cSql);

$tableRows = array();
$counter = 0;

	foreach ($performanceStats as $performanceStat) {
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

		$tableRows[$counter][] = $performanceStat->id;
		$tableRows[$counter][] = $performanceStat->name;
		$tableRows[$counter][] = $performanceStat->position;
		$tableRows[$counter][] = $performanceStat->yearsPlayed;
		$tableRows[$counter][] = $performanceStat->WAR;
		$tableRows[$counter][] = $performanceStat->WAR7;
		$tableRows[$counter][] = $performanceStat->JAWS;
		$tableRows[$counter][] = $performanceStat->JPos;
		$counter++;
	}

$data = $tableRows;

$attributes = array('id' => 'performanceStatsTable_id', 'class' => 'performanceStatsTable_class');

include CLASS_PATH . 'UI.class.php'; // if the UI file has not been included yet
$ui = new UI(); // if the UI class has not been called yet;


// $postFirstname = $_POST['firstname'];
// $postLastname = $_POST['lastname'];
// $postEmail = $_POST['email'];

$table = $ui->simpleTable($caption, $headers, $data, $attributes);
echo $table; // this would render a fully complete table
