<?php
$db = new Database();

$session = new Session();
$loggedIn = $session->checkLoginStatus();

// $loggedIn = 1;

$caption = 'Users';
$headers = array('ID', 'First Name', 'Last Name', 'Email', 'Approved');
if ($loggedIn) {
		array_push($headers, 'Actions');
}

$users = $db->object('User');
// $sql = 'SELECT `id` FROM `users`;';

$tableRows = array();
$counter = 0;

	foreach ($users as $user) {
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


		$tableRows[$counter][] = $user->id;
		$tableRows[$counter][] = $user->firstname;
		$tableRows[$counter][] = $user->lastname;
		$tableRows[$counter][] = $user->email;
		$tableRows[$counter][] = $user->approved;
		if ($loggedIn) {
			$loggedInRow = "<a href=\"user-edit.php?id={$user->id}\" class=\"icon-button\"><i class=\"fas fa-pencil-alt\" role=\"img\" aria-label=\"Edit\"></i></a>";
			$loggedInRow .= "<a href=\"user-delete.php?id={$user->id}\" class=\"icon-button\"><i class=\"far fa-trash-alt\" id=\"delete-user\" role=\"img\" aria-label=\"Delete\"></i></a>\n";
			$tableRows[$counter][] = $loggedInRow;
		}
		$counter++;

	}

$data = $tableRows;

$attributes = array('id' => 'userTable_id', 'class' => 'userTable_class');

include CLASS_PATH . 'UI.class.php'; // if the UI file has not been included yet
$ui = new UI(); // if the UI class has not been called yet;

/*
$addUser = '';
if ($loggedIn) {
	$addUser = "<p><a href=\"user-add.php\" class=\"icon-button\"><i class=\"fas fa-plus-circle\"></i> Add user</a></p>";
}
*/

$table = $ui->simpleTable($caption, $headers, $data, $attributes);
echo $table; // this would render a fully complete table



/*

$sql = 'SELECT `id` FROM `users`;'


$users = $db->object('User');

$tableStart = "<table>\n<caption>Users</caption>\n<tr>\n";
$tableStart .= "<th scope=\"col\">ID</th>\n";
$tableStart .= "<th scope=\"col\">First name</th>\n";
$tableStart .= "<th scope=\"col\">Last name</th>\n";
$tableStart .= "<th scope=\"col\">Email</th>\n";
$tableStart .= "<th scope=\"col\">Approved</th>\n";
if ($loggedIn) {
	$tableStart .= "<th scope=\"col\">Actions</th>\n";
}
$tableStart .= "</tr>\n";

$tableEnd = "</table>\n";

$tableData = '';

foreach ($users as $user) {
	$tableData .= "<tr>\n";
	$tableData .= "<td>{$user->id}</td>\n";
	$tableData .= "<td>{$user->firstname}</td>\n";
	$tableData .= "<td>{$user->lastname}</td>\n";
	$tableData .= "<td>{$user->email}</td>\n";
	$tableData .= "<td>{$user->approved}</td>\n";
	if ($loggedIn) {
		$tableData .= "<td><a href=\"user-edit.php?id={$user->id}\" class=\"icon-button\"><i class=\"fas fa-pencil-alt\" role=\"img\" aria-label=\"Edit\"></i></a> ";
		$tableData .= "<a href=\"user-delete.php?id={$user->id}\" class=\"icon-button\"><i class=\"far fa-trash-alt\" role=\"img\" aria-label=\"Delete\"></i></a></td>\n";
	}
	$tableData .= "</tr>\n";
}

$addUser = '';
if ($loggedIn) {
	$addUser = "<p><a href=\"user-add.php\" class=\"icon-button\"><i class=\"fas fa-plus-circle\"></i> Add user</a></p>";
}

echo $tableStart . $tableData . $tableEnd . $addUser;

*/
