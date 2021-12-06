<?php
$db = new Database();

$session = new Session();
$loggedIn = $session->checkLoginStatus();

// $loggedIn = 1;

$caption = 'Hitting Statistics';
$headers = array('ID', 'Name', 'Position', 'Games', 'At Bats', 'Runs', 'Hits', 'Homeruns', 'RBIs', 'Steals', 'Walks', 'Batting Average', 'OBP', 'Slugging %', 'OPS');

$hpSql = '
SELECT
	`h`.`id`,
	`p`.`name`,
	`pp`.`position`,
	`h`.`games`,
	`h`.`atbats`,
	`h`.`runs`,
	`h`.`hits`,
	`h`.`homeruns`,
	`h`.`rbis`,
	`h`.`steals`,
	`h`.`walks`,
	`h`.`battingAverage`,
	`h`.`onBasePercentage`,
	`h`.`slug`,
	`h`.`OPS`
FROM `hitterStats` AS `h`
LEFT JOIN `players` AS `p`
ON `h`.`player_id` = `p`.`id`
LEFT JOIN `primaryPosition` AS `pp`
ON `pp`.`id` = `h`.`position_id`';

$hitterStats = $db->object('Hitting', $hpSql);

$tableRows = array();
$counter = 0;

	foreach ($hitterStats as $hitterStat) {
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

		$tableRows[$counter][] = $hitterStat->id;
		$tableRows[$counter][] = $hitterStat->name;
		$tableRows[$counter][] = $hitterStat->position;
		$tableRows[$counter][] = $hitterStat->games;
		$tableRows[$counter][] = $hitterStat->atbats;
		$tableRows[$counter][] = $hitterStat->runs;
		$tableRows[$counter][] = $hitterStat->hits;
		$tableRows[$counter][] = $hitterStat->homeruns;
		$tableRows[$counter][] = $hitterStat->rbis;
		$tableRows[$counter][] = $hitterStat->steals;
		$tableRows[$counter][] = $hitterStat->walks;
		$tableRows[$counter][] = $hitterStat->battingAverage;
		$tableRows[$counter][] = $hitterStat->onBasePercentage;
		$tableRows[$counter][] = $hitterStat->slug;
		$tableRows[$counter][] = $hitterStat->OPS;
		$counter++;
	}

$data = $tableRows;

$attributes = array('id' => 'hittingStatsTable_id', 'class' => 'hittingStatsTable_class');

include CLASS_PATH . 'UI.class.php'; // if the UI file has not been included yet
$ui = new UI(); // if the UI class has not been called yet;


// $postFirstname = $_POST['firstname'];
// $postLastname = $_POST['lastname'];
// $postEmail = $_POST['email'];

$table = $ui->simpleTable($caption, $headers, $data, $attributes);
echo $table; // this would render a fully complete table
