<?php
$db = new Database();

$session = new Session();
$loggedIn = $session->checkLoginStatus();

// $loggedIn = 1;

$caption = 'Positions';
$headers = array('ID', 'Position');

$positions = $db->object('Position');
// $sql = 'SELECT `id` FROM `users`;';

$tableRows = array();
$counter = 0;

	foreach ($positions as $position) {
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

		$tableRows[$counter][] = $position->id;
		$tableRows[$counter][] = $position->position;
		$counter++;
	}

$data = $tableRows;

$attributes = array('id' => 'positionTable_id', 'class' => 'positionTable_class');

include CLASS_PATH . 'UI.class.php'; // if the UI file has not been included yet
$ui = new UI(); // if the UI class has not been called yet;


// $postFirstname = $_POST['firstname'];
// $postLastname = $_POST['lastname'];
// $postEmail = $_POST['email'];

$table = $ui->simpleTable($caption, $headers, $data, $attributes);
echo '<H3>This page displays a reference table of all positions played in baseball.</H3>';
echo $table; // this would render a fully complete table
