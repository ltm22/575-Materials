<?php
$db = new Database();

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
';

$submissions = $db->object('Submission', $sql);

$tableStart = "<table>\n<caption>Submissions</caption>\n<tr>\n";
$tableStart .= "<th scope=\"col\">ID</th>\n";
$tableStart .= "<th scope=\"col\">User ID</th>\n";
$tableStart .= "<th scope=\"col\">First Name</th>\n";
$tableStart .= "<th scope=\"col\">Last Name</th>\n";
$tableStart .= "<th scope=\"col\">Assignment ID</th>\n";
$tableStart .= "<th scope=\"col\">Assignment Name</th>\n";
$tableStart .= "<th scope=\"col\">Submission Date and Time</th>\n";
$tableStart .= "<th scope=\"col\">Submission Grade</th>\n";
$tableStart .= "<th scope=\"col\">Actions</th>\n";
$tableStart .= "</tr>\n";

$tableEnd = "</table>\n";

$tableData = '';

foreach ($submissions as $submission) {
	$tableData .= "<tr>\n";
	$tableData .= "<td>{$submission->id}</td>\n";
	$tableData .= "<td>{$submission->user_id}</td>\n";
	$tableData .= "<td>{$submission->firstname}</td>\n";
	$tableData .= "<td>{$submission->lastname}</td>\n";
	$tableData .= "<td>{$submission->assignment_id}</td>\n";
	$tableData .= "<td>{$submission->name}</td>\n";
	$tableData .= "<td>{$submission->datetime}</td>\n";
	$tableData .= "<td>{$submission->grade}</td>\n";
	$tableData .= "<td><a href=\"submission-edit.php?id={$submission->id}\" class=\"icon-button\"><i class=\"fas fa-pencil-alt\" role=\"img\" aria-label=\"Edit\"></i></a> ";
	$tableData .= "<a href=\"submission-delete.php?id={$submission->id}\" class=\"icon-button\"><i class=\"far fa-trash-alt\" role=\"img\" aria-label=\"Delete\"></i></a></td>\n";
	$tableData .= "</tr>\n";
}

$addSubmission = "<p><a href=\"submission-add.php\" class=\"icon-button\"><i class=\"fas fa-plus-circle\"></i> Add submission</a></p>";

echo $tableStart . $tableData . $tableEnd . $addSubmission;
