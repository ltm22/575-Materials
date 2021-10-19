<?php
$db = new Database();

$postError = "<p>Error: form submission was incomplete.</p>\n";

if (isset($_POST['user_id'])) {

	$postUser_id = $_POST['user_id'];
	$postFirstname = $_POST['firstname'];
	$postLastname = $_POST['lastname'];
	$postAssignment_id = $_POST['assignment_id'];
 	$postName = $_POST['name'];
	$postDatetime = $_POST['datetime'];
	$postGrade = $_POST['grade'];
	if ($postGrade == '') {
		$postGrade = 0;
	}

	if (!isset($_POST['user_id']) || !isset($_POST['firstname']) || !isset($_POST['lastname']) || !isset($_POST['assignment_id']) || !isset($_POST['name']) || !isset($_POST['datetime']) || !isset($_POST['grade'])) {
		echo $postError;
		return;
	}
	$insertSql = "INSERT INTO `submissions` (`user_id`, `assignment_id`, `datetime`, `grade`) ";
		if ($postDatetime == null or $postDatetime == '') {
			$insertSql .= " VALUES (\"{$postUser_id}\", \"{$postAssignment_id}\", NULL, \"{$postGrade}\");";
		}
		else {
			$insertSql .= " VALUES (\"{$postUser_id}\", \"{$postAssignment_id}\", \"{$postDatetime}\", \"{$postGrade}\");";
		}
//	$insertSql .= "INSERT INTO `users` (`firstname`, `lastname`) ";
//	$insertSql .= " VALUES (\"{$postFirstname}\", \"{$postLastname}\");";
//	$insertSql .= "INSERT INTO `assignments` (`name`) ";
//	$insertSql .= " VALUES (\"{$postName}\");";
	$insertId = $db->insert($insertSql);

	$sql = '
	SELECT
		`s`.`id`,
		`s`.`user_id`,
		`u`.`firstname`,
		`u`.`lastname`,
		`s`.`assignment_id`,
		`a`.`name`,
		`s`.`datetime`,
		`s`.`grade`
	FROM `submissions` AS `s`
	LEFT JOIN `users` AS `u`
		ON `s`.`user_id` = `u`.`id`
	LEFT JOIN `assignments` AS `a`
		ON `s`.`assignment_id` = `a`.`id`
		WHERE `s`.`id` = ' . $insertId;

	$submission = $db->object('Submission', $sql);

	// the above action returns an array, but we only need one object, so we'll limit the result to the first object
	$submission = $submission[0];

	$success = "<h2>Submission Created</h2>\n";
	$success .= "<p>User ID: {$submission->user_id}</p>\n";
	$success .= "<p>First name: {$submission->firstname}</p>\n";
	$success .= "<p>Last name: {$submission->lastname}</p>\n";
	$success .= "<p>Assignment ID: {$submission->assignment_id}</p>\n";
	$success .= "<p>Assignment Name: {$submission->name}</p>\n";
	$success .= "<p>Time of Submission: {$submission->datetime}</p>\n";
	$success .= "<p>Grade: {$submission->grade}</p>\n";
	$success .= "<p><a href=\"submissions.php\" class=\"button\">Back to submission list</a></p>";
	echo $success;
	return;
}

$formStart = "<form action=\"submission-add.php\" method=\"post\">\n";
$formEnd = "<p><input type=\"submit\" id=\"submit\"></p>\n</form>\n";
$form = '';

$form .= "<p><label for=\"user_id\">User ID</label> <input type=\"text\" name=\"user_id\" required id=\"user_id\" value=\"\"></p>";
$form .= "<p><label for=\"firstname\">First name</label> <input type=\"text\" name=\"firstname\" id=\"firstname\" value=\"\"></p>";
$form .= "<p><label for=\"lastname\">Last name</label> <input type=\"text\" name=\"lastname\" id=\"lastname\" value=\"\"></p>";
$form .= "<p><label for=\"assignment_id\">Assignment ID</label> <input type=\"text\" name=\"assignment_id\" required id=\"assignment_id\" value=\"\"></p>";
$form .= "<p><label for=\"name\">Assignment name</label> <input type=\"text\" name=\"name\" id=\"name\" value=\"\"></p>";
$form .= "<p><label for=\"datetime\">Time of Submission</label> <input type=\"text\" name=\"datetime\" id=\"datetime\" value=\"\"></p>";
$form .= "<p><label for=\"grade\">Grade</label> <input type=\"text\" name=\"grade\" id=\"grade\" value=\"\"></p>";


echo $formStart . $form . $formEnd;
