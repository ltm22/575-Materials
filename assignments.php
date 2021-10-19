<?php

/**
* Connect to the database
*/
$host = 'localhost';
$db   = 'anly575';
$user = 'LTM22';
$pass = 'Snoopdogg17';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
     $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

$sql = 'SELECT * FROM `assignments`;';

$data = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

$nl = "\n";

$pageStart = '<!DOCTYPE html>
<html lang="en">
<head>
<title>Data practice page</title>
<style>
table,td,th {
      border-collapse: collapse;
      border: 1px solid #1e1e1e;
}
td,th {
     padding:5px;
}
</style>
</head>
<body>
<main>
<h1>Data practice page</h1>
';

$pageEnd = '
</main>
</body>
</html>';


$debug = '<p>Debug view of query results:</p>' . $nl;
$debug .= '<pre>' . $nl;
$debug .= print_r($data, true);
$debug .= '</pre>' . $nl;


/**
 * Render the results in a table
*/

$tableStart = $nl . '<table>' . $nl;
$tableStart .= '    <caption>Assignments</caption>' . $nl;

$tableHeaders = '    <tr>' . $nl;
$tableHeaders .= '        <th scope="col">ID</th>' . $nl;
$tableHeaders .= '        <th scope="col">Name</th>' . $nl;
$tableHeaders .= '        <th scope="col">Description</th>' . $nl;
$tableHeaders .= '        <th scope="col">Deadline</th>' . $nl;
$tableHeaders .= '    </tr>' . $nl;

$tableEnd = '</table>' . $nl;

$tableRows = null;
foreach ($data as $key => $row) {
     $tableRows .= '    <tr>' . $nl;
     $tableRows .= '        <td>' . $row['id'] . '</td>' . $nl;
     $tableRows .= '        <td>' . $row['name'] . '</td>' . $nl;
     $tableRows .= '        <td>' . $row['description'] . '</td>' . $nl;
     $tableRows .= '        <td>' . $row['deadline'] . '</td>' . $nl;
     $tableRows .= '    </tr>' . $nl;
}

echo $pageStart;
echo $debug;
echo $tableStart . $tableHeaders . $tableRows . $tableEnd;
echo $pageEnd;
