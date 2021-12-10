<?php
include 'init/init.php';

$values->title = 'Hitting Stats';
$values->heading = 'Hitting Stats';

$page = new Page('main.page.template.php');
$page->render($values, __FILE__);
