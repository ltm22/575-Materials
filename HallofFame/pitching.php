<?php
include 'init/init.php';

$values->title = 'Pitching Stats';
$values->heading = 'Pitching Stats';

$page = new Page('main.page.template.php');
$page->render($values, __FILE__);
