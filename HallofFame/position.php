<?php
include 'init/init.php';

$values->title = 'Positions';
$values->heading = 'Positions';

$page = new Page('main.page.template.php');
$page->render($values, __FILE__);
