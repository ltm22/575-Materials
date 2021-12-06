<?php
include 'init/init.php';

$values->title = 'Players';
$values->heading = 'Players';

$page = new Page('main.page.template.php');
$page->render($values, __FILE__);
