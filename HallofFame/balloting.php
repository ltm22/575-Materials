<?php
include 'init/init.php';

$values->title = 'Most Recent Hall of Fame Balloting Results (Per Player)';
$values->heading = 'Most Recent Hall of Fame Balloting Results  (Per Player)';

$page = new Page('main.page.template.php');
$page->render($values, __FILE__);
