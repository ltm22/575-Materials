<?php
include 'init/init.php';

$values->title = 'Career Stats';
$values->heading = 'Career Stats';

$page = new Page('main.page.template.php');
$page->render($values, __FILE__);
