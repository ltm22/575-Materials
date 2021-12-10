<?php

// localhost
if ( ($_SERVER['HTTP_HOST'] == 'localhost') || ($_SERVER['HTTP_HOST'] == '127.0.0.1') ) {
	define("ROOT_PATH", '/Users/leonardmarshall/Georgetown_Coursework/575/575-Materials/HallofFame/');
	define("PROTOCOL", 'http://');
	define("DOMAIN", 'localhost/');
	define('DB', array(
		'host' => 'localhost',
		'db'   => 'anly575',
		'user' => 'LTM22',
		'pass' => 'LTM22',
		'charset' => 'utf8mb4'
	));

} else {
	// public server
	define("ROOT_PATH", '/home/leonardm/public_html/575 Materials/HallofFame');
	define("PROTOCOL", 'http://'); // change to https:// if necessary
	define("DOMAIN", 'leonardmarshall.georgetown.domains/575 Materials/');
	define('DB', array(
		'host' => 'localhost',
		'db'   => 'leonardm_anly575',
		'user' => 'leonardm_user1',
		'pass' => 'U.VaPwPw17',
		'charset' => 'utf8mb4'
	));
}

define("ADMIN_EMAIL", 'ltm22@georgetown.edu');
define("CLASS_PATH", ROOT_PATH . '/classes/');
define("TEMPLATE_PATH", ROOT_PATH . '/templates/');
define("SUBFOLDER", 'HallofFame/');
define("URL_ROOT", PROTOCOL . DOMAIN . SUBFOLDER);
define ('TABLES', array(
	'User' => 'users',
	'Assignment' => 'assignments',
	'Submission' => 'submissions',
	'Course' => 'courses',
	'Balloting' => 'mostRecentBalloting',
	'Hitting' => 'hitterStats',
	'Career' => 'performanceStats',
	'Pitching' => 'pitcherStats',
	'Player' => 'players',
	'Position' => 'primaryPosition'
));
