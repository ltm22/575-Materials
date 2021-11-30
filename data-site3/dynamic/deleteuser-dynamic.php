<?php

include '../init/init.php';

if (isset($_GET['user_id'])) {
//echo $_GET['user_id'];
	if (!is_numeric($_GET['user_id'])) {
		echo '<p>Error: the submitted id was not numeric.</p>';
		return;
	} else {
		$GETId = $_GET['user_id'];
	}

  $db = new Database();

  $sql = "SELECT `firstname`, `lastname`, `email` FROM `users` WHERE `id` =" . $GETId;
//  echo $sql;
  $result = $db->object('User',$sql);
  $user = $result[0];
//  print_r($result);
  $deleteSql = "Delete FROM `users` WHERE `id` = " . $GETId;
  // echo $deleteSql;
  $delete = $db->query($deleteSql);

  $success = "<h2>User Deleted</h2>\n";
  $success .= "<p>{$user->firstname} {$user->lastname} ({$user->email})</p>\n";
  echo $success;
  return;

}
else {
  $failure = "<h2>User NOT Deleted</h2>\n";
  $failure .= "<p>No user was specified.</p>\n";
  echo $failure;
  return;
}
