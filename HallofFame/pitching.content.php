<?php
$db = new Database();

$session = new Session();
$loggedIn = $session->checkLoginStatus();

// $loggedIn = 1;

$caption = 'Pitching Statistics';
$headers = array('ID', 'Name', 'Position', 'Wins', 'Losses', 'ERA', 'WHIP', 'Games', 'Starts', 'Saves', 'Innings Pitched', 'Hits Allowed', 'Homeruns Allowed', 'Walks', 'Strikeouts');

$psSql = '
SELECT
	`ps`.`id`,
	`p`.`name`,
	`pp`.`position`,
	`ps`.`wins`,
	`ps`.`losses`,
	`ps`.`ERA`,
	`ps`.`WHIP`,
	`ps`.`games`,
	`ps`.`gamesStarted`,
	`ps`.`saves`,
	`ps`.`inningsPitched`,
	`ps`.`hits`,
	`ps`.`homeruns`,
	`ps`.`walks`,
	`ps`.`strikeouts`
FROM `pitcherStats` AS `ps`
LEFT JOIN `players` AS `p`
ON `ps`.`player_id` = `p`.`id`
LEFT JOIN `primaryPosition` AS `pp`
ON `pp`.`id` = `ps`.`position_id`';

$pitcherStats = $db->object('Pitching', $psSql);

$tableRows = array();
$counter = 0;

	foreach ($pitcherStats as $pitcherStat) {
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

		$tableRows[$counter][] = $pitcherStat->id;
		$tableRows[$counter][] = $pitcherStat->name;
		$tableRows[$counter][] = $pitcherStat->position;
		$tableRows[$counter][] = $pitcherStat->wins;
		$tableRows[$counter][] = $pitcherStat->losses;
		$tableRows[$counter][] = $pitcherStat->ERA;
		$tableRows[$counter][] = $pitcherStat->WHIP;
		$tableRows[$counter][] = $pitcherStat->games;
		$tableRows[$counter][] = $pitcherStat->gamesStarted;
		$tableRows[$counter][] = $pitcherStat->saves;
		$tableRows[$counter][] = $pitcherStat->inningsPitched;
		$tableRows[$counter][] = $pitcherStat->hits;
		$tableRows[$counter][] = $pitcherStat->homeruns;
		$tableRows[$counter][] = $pitcherStat->walks;
		$tableRows[$counter][] = $pitcherStat->strikeouts;
		$counter++;
	}

$data = $tableRows;

$attributes = array('id' => 'pitchingStatsTable_id', 'class' => 'pitchingStatsTable_class');

include CLASS_PATH . 'UI.class.php'; // if the UI file has not been included yet
$ui = new UI(); // if the UI class has not been called yet;


// $postFirstname = $_POST['firstname'];
// $postLastname = $_POST['lastname'];
// $postEmail = $_POST['email'];

$table = $ui->simpleTable($caption, $headers, $data, $attributes);
echo $table; // this would render a fully complete table
