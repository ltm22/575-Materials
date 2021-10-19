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

	if (!isset($_POST['user_id']) || !isset($_POST['assignment_id']) || !isset($_POST['datetime']) || !isset($_POST['grade'])) {
		echo $postError;
		return;
	}
	$deleteSql = "Delete FROM `submissions` WHERE `id` = " . $_GET['id'];
	$delete = $db->query($deleteSql);

	$success = "<h2>Submission Deleted</h2>\n";
	$success .= "<p>User id: {$postUser_id}, assignment id: {$postAssignment_id}, date and time of submission: {$postDatetime}, with grade: {$postGrade}</p>\n";
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

$submissionData = '';

$data = $submission[0];


$formStart = "<form action=\"submission-delete.php?id={$getId}\" method=\"post\">\n";
$submissionData .= "<input type=\"hidden\" name=\"id\" id=\"id\" value=\"{$data->id}\">\n";
$submissionData .= "<input type=\"hidden\" name=\"user_id\" id=\"user_id\" value=\"{$data->user_id}\">\n";
// $submissionData .= "<input type=\"hidden\" name=\"firstname\" id=\"firstname\" value=\"{$data->firstname}\">\n";
// $submissionData .= "<input type=\"hidden\" name=\"lastname\" id=\"lastname\" value=\"{$data->lastname}\">\n";
$submissionData .= "<input type=\"hidden\" name=\"assignment_id\" id=\"assignment_id\" value=\"{$data->assignment_id}\">\n";
// $submissionData .= "<input type=\"hidden\" name=\"name\" id=\"name\" value=\"{$data->name}\">\n";
$submissionData .= "<input type=\"hidden\" name=\"datetime\" id=\"datetime\" value=\"{$data->datetime}\">\n";
$submissionData .= "<input type=\"hidden\" name=\"grade\" id=\"grade\" value=\"{$data->grade}\">\n";
$submissionData .= "<p>Are you sure you want to delete this submission (user id: {$data->user_id}, assignment id: {$data->assignment_id}, date and time of submission: {$data->datetime}, with grade: {$data->grade})?</p>\n";
$confirm = "<p><a href=\"\"><input type=\"submit\" value=\"Delete\"> <a href=\"submissions.php\">Back to submission list</a></p>\n";
$formEnd = "</form>";

echo $formStart . $submissionData . $confirm . $formEnd;
