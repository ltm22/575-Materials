<?php
$db = new Database();

if (!isset($_GET['id'])) {
	echo "<p>Error: No submission selected</p>";
	return;
}
if (!is_numeric($_GET['id'])) {
	echo "<p>Error: The id must be numeric.</p>";
	return;
} else {
	$getId = $_GET['id'];
}

$postError = "<p>Error: form submission was incomplete.</p>\n";

if (isset($_POST['id'])) {

	if (!is_numeric($_POST['id'])) {
		echo '<p>Error: the posted id was not numeric.</p>';
		return;
	} else {
		$postId = $_POST['id'];
	}
	$postUser_id = $_POST['user_id'];
	$postAssignment_id = $_POST['assignment_id'];
	$postDatetime = $_POST['datetime'];
	$postGrade = $_POST['grade'];

	//echo 'post';
	if (!isset($_POST['id']) || !isset($_POST['user_id']) || !isset($_POST['assignment_id']) || !isset($_POST['datetime']) || !isset($_POST['grade'])) {
		echo $postError;
		return;
	}
	$updateSql = "UPDATE `submissions` SET `user_id` = \"{$postUser_id}\", `assignment_id` = \"{$postAssignment_id}\", `datetime` = \"{$postDatetime}\", `grade` = \"{$postGrade}\" WHERE `id` = " . $_GET['id'];
	$update = $db->query($updateSql);
	$sql = 'SELECT * FROM `submissions` WHERE `id` = ' . $_POST['id'];
	$submission = $db->object('Submission', $sql);

	// the above action returns an array, but we only need one object, so we'll limit the result to the first object
	$submission = $submission[0];

	$success = "<h2>Submission Updated</h2>\n";
	$success .= "<p>User ID: " . $submission->user_id . "</p>\n";
	$success .= "<p>Assignment ID: {$submission->assignment_id}</p>\n";
	$success .= "<p>Submission Date/Time: {$submission->datetime}</p>\n";
	$success .= "<p>Grade: {$submission->grade}</p>\n";
	$success .= "<p><a href=\"submissions.php\" class=\"button\">Back to submission list</a></p>";
	echo $success;
	return;

}

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
WHERE `s`.`id` = ' . $_GET['id'];

$submission = $db->object('Submission', $sql);

$formStart = "<form action=\"submission-edit.php?id={$getId}\" method=\"post\">\n";
$formEnd = "<p><input type=\"submit\" id=\"submit\"></p>\n</form>\n";
$form = '';

$data = $submission[0];

$form .= "<input type=\"hidden\" name=\"id\" id=\"id\" value=\"{$data->id}\">";
$form .= "<p><label for=\"user_id\">User Id</label> <input type=\"text\" name=\"user_id\" id=\"user_id\" value=\"{$data->user_id}\"></p>";
$form .= "<p><label for=\"assignment_id\">Assignment ID</label> <input type=\"text\" name=\"assignment_id\" id=\"assignment_id\" value=\"{$data->assignment_id}\"></p>";
$form .= "<p><label for=\"datetime\">Submission Time and Date</label> <input type=\"text\" name=\"datetime\" id=\"datetime\" value=\"{$data->datetime}\"></p>";
$form .= "<p><label for=\"grade\">Grade</label> <input type=\"text\" name=\"grade\" id=\"grade\" value=\"{$data->grade}\"></p>";


echo $formStart . $form . $formEnd;
