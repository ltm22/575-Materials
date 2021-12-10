<?php
$db = new Database();

$session = new Session();
$loggedIn = $session->checkLoginStatus();

// $loggedIn = 1;

$caption = 'Career Statistics';
$headers = array('ID', 'Name', 'Position', 'Years Played', 'WAR', 'WAR7', 'JAWS', 'JPos');

$cSql = '
SELECT
	`ps`.`id`,
	`p`.`name`,
	`pp`.`position`,
	`ps`.`yearsPlayed`,
	`ps`.`WAR`,
	`ps`.`WAR7`,
	`ps`.`JAWS`,
	`ps`.`JPos`
FROM `performanceStats` AS `ps`
LEFT JOIN `players` AS `p`
ON `ps`.`player_id` = `p`.`id`
LEFT JOIN `primaryPosition` AS `pp`
ON `pp`.`id` = `ps`.`position_id`
ORDER BY `ps`.`player_id`';

$performanceStats = $db->object('Career', $cSql);

$tableRows = array();
$counter = 0;

	foreach ($performanceStats as $performanceStat) {
		// $tableRows .= "<tr>\n";
		/* $tableRows[] = "<tr><td>{$user->id}</td>\n";
		$tableRows[] .= "<td>{$user->firstname}</td>\n";
		$tableRows[] .= "<td>{$user->lastname}</td>\n";
		$tableRows[] .= "<td>{$user->email}</td>\n";
		$tableRows[] .= "<td>{$user->approved}</td>\n";
		if ($loggedIn) {
			$tableRows[] .= "<td><a href=\"user-edit.php?id={$user->id}\" class=\"icon-button\"><i class=\"fas fa-pencil-alt\" role=\"img\" aria-label=\"Edit\"></i></a> ";
			$tableRows[] .= "<a href=\"user-delete.php?id={$user->id}\" class=\"icon-button\"><i class=\"far fa-trash-alt\" id=\"delete-user\" role=\"img\" aria-label=\"Delete\"></i></a></td>\n";
		}
		$tableRows[] .= "</tr>\n"; */

		$tableRows[$counter][] = $performanceStat->id;
		$tableRows[$counter][] = $performanceStat->name;
		$tableRows[$counter][] = $performanceStat->position;
		$tableRows[$counter][] = $performanceStat->yearsPlayed;
		$tableRows[$counter][] = $performanceStat->WAR;
		$tableRows[$counter][] = $performanceStat->WAR7;
		$tableRows[$counter][] = $performanceStat->JAWS;
		$tableRows[$counter][] = $performanceStat->JPos;
		$counter++;
	}

$data = $tableRows;

$attributes = array('id' => 'performanceStatsTable_id', 'class' => 'performanceStatsTable_class');

include CLASS_PATH . 'UI.class.php'; // if the UI file has not been included yet
$ui = new UI(); // if the UI class has not been called yet;


// $postFirstname = $_POST['firstname'];
// $postLastname = $_POST['lastname'];
// $postEmail = $_POST['email'];

$table = $ui->simpleTable($caption, $headers, $data, $attributes);
echo '<H3>This page displays a table populated with the advanced metrics of all players nominated to the Hall of Fame from 2018 to 2020.</H3>';
echo '<H4>Below the table, you may find a data visualization comparing the average Wins Above Replacement (WAR) of nominated players, by position.</H4>';
echo $table; // this would render a fully complete table

echo '<H3>WAR measures a player\'s value in all facets of the game by deciphering how many more wins he\'s worth than a replacement-level player at his same position.</H3>';

$pSql = '
SELECT
	`ps`.`id`,
	`p`.`name`,
	`pp`.`position`,
	`ps`.`yearsPlayed`,
	`ps`.`WAR`,
	`ps`.`WAR7`,
	`ps`.`JAWS`,
	`ps`.`JPos`
FROM `performanceStats` AS `ps`
LEFT JOIN `players` AS `p`
ON `ps`.`player_id` = `p`.`id`
LEFT JOIN `primaryPosition` AS `pp`
ON `pp`.`id` = `ps`.`position_id`
WHERE `pp`.`position` = "Pitcher"
ORDER BY `ps`.`player_id`';

$b1Sql = '
SELECT
	`ps`.`id`,
	`p`.`name`,
	`pp`.`position`,
	`ps`.`yearsPlayed`,
	`ps`.`WAR`,
	`ps`.`WAR7`,
	`ps`.`JAWS`,
	`ps`.`JPos`
FROM `performanceStats` AS `ps`
LEFT JOIN `players` AS `p`
ON `ps`.`player_id` = `p`.`id`
LEFT JOIN `primaryPosition` AS `pp`
ON `pp`.`id` = `ps`.`position_id`
WHERE `pp`.`position` = "First Base"
ORDER BY `ps`.`player_id`';

$b2Sql = '
SELECT
	`ps`.`id`,
	`p`.`name`,
	`pp`.`position`,
	`ps`.`yearsPlayed`,
	`ps`.`WAR`,
	`ps`.`WAR7`,
	`ps`.`JAWS`,
	`ps`.`JPos`
FROM `performanceStats` AS `ps`
LEFT JOIN `players` AS `p`
ON `ps`.`player_id` = `p`.`id`
LEFT JOIN `primaryPosition` AS `pp`
ON `pp`.`id` = `ps`.`position_id`
WHERE `pp`.`position` = "Second Base"
ORDER BY `ps`.`player_id`';

$b3Sql = '
SELECT
	`ps`.`id`,
	`p`.`name`,
	`pp`.`position`,
	`ps`.`yearsPlayed`,
	`ps`.`WAR`,
	`ps`.`WAR7`,
	`ps`.`JAWS`,
	`ps`.`JPos`
FROM `performanceStats` AS `ps`
LEFT JOIN `players` AS `p`
ON `ps`.`player_id` = `p`.`id`
LEFT JOIN `primaryPosition` AS `pp`
ON `pp`.`id` = `ps`.`position_id`
WHERE `pp`.`position` = "Third Base"
ORDER BY `ps`.`player_id`';

$ssSql = '
SELECT
	`ps`.`id`,
	`p`.`name`,
	`pp`.`position`,
	`ps`.`yearsPlayed`,
	`ps`.`WAR`,
	`ps`.`WAR7`,
	`ps`.`JAWS`,
	`ps`.`JPos`
FROM `performanceStats` AS `ps`
LEFT JOIN `players` AS `p`
ON `ps`.`player_id` = `p`.`id`
LEFT JOIN `primaryPosition` AS `pp`
ON `pp`.`id` = `ps`.`position_id`
WHERE `pp`.`position` = "Shortstop"
ORDER BY `ps`.`player_id`';

$lfSql = '
SELECT
	`ps`.`id`,
	`p`.`name`,
	`pp`.`position`,
	`ps`.`yearsPlayed`,
	`ps`.`WAR`,
	`ps`.`WAR7`,
	`ps`.`JAWS`,
	`ps`.`JPos`
FROM `performanceStats` AS `ps`
LEFT JOIN `players` AS `p`
ON `ps`.`player_id` = `p`.`id`
LEFT JOIN `primaryPosition` AS `pp`
ON `pp`.`id` = `ps`.`position_id`
WHERE `pp`.`position` = "Left Field"
ORDER BY `ps`.`player_id`';

$cfSql = '
SELECT
	`ps`.`id`,
	`p`.`name`,
	`pp`.`position`,
	`ps`.`yearsPlayed`,
	`ps`.`WAR`,
	`ps`.`WAR7`,
	`ps`.`JAWS`,
	`ps`.`JPos`
FROM `performanceStats` AS `ps`
LEFT JOIN `players` AS `p`
ON `ps`.`player_id` = `p`.`id`
LEFT JOIN `primaryPosition` AS `pp`
ON `pp`.`id` = `ps`.`position_id`
WHERE `pp`.`position` = "Center Field"
ORDER BY `ps`.`player_id`';

$rfSql = '
SELECT
	`ps`.`id`,
	`p`.`name`,
	`pp`.`position`,
	`ps`.`yearsPlayed`,
	`ps`.`WAR`,
	`ps`.`WAR7`,
	`ps`.`JAWS`,
	`ps`.`JPos`
FROM `performanceStats` AS `ps`
LEFT JOIN `players` AS `p`
ON `ps`.`player_id` = `p`.`id`
LEFT JOIN `primaryPosition` AS `pp`
ON `pp`.`id` = `ps`.`position_id`
WHERE `pp`.`position` = "Right Field"
ORDER BY `ps`.`player_id`';

$dhSql = '
SELECT
	`ps`.`id`,
	`p`.`name`,
	`pp`.`position`,
	`ps`.`yearsPlayed`,
	`ps`.`WAR`,
	`ps`.`WAR7`,
	`ps`.`JAWS`,
	`ps`.`JPos`
FROM `performanceStats` AS `ps`
LEFT JOIN `players` AS `p`
ON `ps`.`player_id` = `p`.`id`
LEFT JOIN `primaryPosition` AS `pp`
ON `pp`.`id` = `ps`.`position_id`
WHERE `pp`.`position` = "Designated Hitter"
ORDER BY `ps`.`player_id`';

$pitcherStats = $db->object('Career', $pSql);
$firstbaseStats = $db->object('Career', $b1Sql);
$SecondbaseStats = $db->object('Career', $b2Sql);
$ThirdbaseStats = $db->object('Career', $b3Sql);
$ShortstopStats = $db->object('Career', $ssSql);
$LeftfieldStats = $db->object('Career', $lfSql);
$CenterfieldStats = $db->object('Career', $cfSql);
$RightfieldStats = $db->object('Career', $rfSql);
$DesignatedHitterStats = $db->object('Career', $dhSql);

$counter = 0;
	foreach ($pitcherStats as $pitcherStat) {
		$pitcherWarValues[$counter][] = $pitcherStat->WAR;
		$counter++;
		}

$counter = 0;
	foreach ($firstbaseStats as $firsbaseStat) {
		$b1WarValues[$counter][] = $firsbaseStat->WAR;
		$counter++;
		}

$counter = 0;

foreach ($SecondbaseStats as $SecondbaseStat) {
	$b2WarValues[$counter][] = $SecondbaseStat->WAR;
	$counter++;
	}

$counter = 0;
	foreach ($ThirdbaseStats as $ThirdbaseStat) {
		$b3WarValues[$counter][] = $ThirdbaseStat->WAR;
		$counter++;
		}

$counter = 0;
	foreach ($ShortstopStats as $ShortstopStat) {
		$ssWarValues[$counter][] = $ShortstopStat->WAR;
		$counter++;
		}

$counter = 0;
	foreach ($LeftfieldStats as $LeftfieldStat) {
		$lfWarValues[$counter][] = $LeftfieldStat->WAR;
		$counter++;
		}

$counter = 0;
	foreach ($CenterfieldStats as $CenterfieldStat) {
		$cfWarValues[$counter][] = $CenterfieldStat->WAR;
		$counter++;
	}

$counter = 0;
	foreach ($RightfieldStats as $RightfieldStat) {
		$rfWarValues[$counter][] = $RightfieldStat->WAR;
		$counter++;
		}

$counter = 0;
	foreach ($DesignatedHitterStats as $DesignatedHitterStat) {
		$dhWarValues[$counter][] = $DesignatedHitterStat->WAR;
		$counter++;
		}

?>

<div id= 'chart-container'></div>

<script>

var pitcherWar = <?php echo json_encode($pitcherWarValues, JSON_NUMERIC_CHECK); ?>;
console.log(pitcherWar);
var b1War = <?php echo json_encode($b1WarValues, JSON_NUMERIC_CHECK); ?>;
console.log(b1War);
var b2War = <?php echo json_encode($b2WarValues, JSON_NUMERIC_CHECK); ?>;
console.log(b2War);
var b3War = <?php echo json_encode($b3WarValues, JSON_NUMERIC_CHECK); ?>;
console.log(b3War);
var ssWar = <?php echo json_encode($ssWarValues, JSON_NUMERIC_CHECK); ?>;
console.log(ssWar);
var lfWar = <?php echo json_encode($lfWarValues, JSON_NUMERIC_CHECK); ?>;
console.log(lfWar);
var cfWar = <?php echo json_encode($cfWarValues, JSON_NUMERIC_CHECK); ?>;
console.log(cfWar);
var rfWar = <?php echo json_encode($rfWarValues, JSON_NUMERIC_CHECK); ?>;
console.log(rfWar);
var dhWar = <?php echo json_encode($dhWarValues, JSON_NUMERIC_CHECK); ?>;
console.log(dhWar);

var totalPitcherWar = 0;
for(var i = 0; i < pitcherWar.length; i++) {
    totalPitcherWar += parseInt(pitcherWar[i]);
}
var avgPitcherWar = totalPitcherWar / pitcherWar.length;


var totalb1War = 0;
for(var i = 0; i < b1War.length; i++) {
    totalb1War += parseInt(b1War[i]);
}
var avgb1War = totalb1War / b1War.length;

var totalb2War = 0;
for(var i = 0; i < b2War.length; i++) {
    totalb2War += parseInt(b2War[i]);
}
var avgb2War = totalb2War / b2War.length;

var totalb3War = 0;
for(var i = 0; i < b3War.length; i++) {
    totalb3War += parseInt(b3War[i]);
}
var avgb3War = totalb3War / b3War.length;

var totalssWar = 0;
for(var i = 0; i < ssWar.length; i++) {
    totalssWar += parseInt(ssWar[i]);
}
var avgssWar = totalssWar / ssWar.length;

var totallfWar = 0;
for(var i = 0; i < lfWar.length; i++) {
    totallfWar += parseInt(lfWar[i]);
}
var avglfWar = totallfWar / lfWar.length;

var totalcfWar = 0;
for(var i = 0; i < cfWar.length; i++) {
    totalcfWar += parseInt(cfWar[i]);
}
var avgcfWar = totalcfWar / cfWar.length;

var totalrfWar = 0;
for(var i = 0; i < rfWar.length; i++) {
    totalrfWar += parseInt(rfWar[i]);
}
var avgrfWar = totalrfWar / rfWar.length;

var totaldhWar = 0;
for(var i = 0; i < dhWar.length; i++) {
    totaldhWar += parseInt(dhWar[i]);
}
var avgdhWar = totaldhWar / dhWar.length;

var overallWARdata = []
console.log(overallWARdata)
overallWARdata.push(avgPitcherWar, avgb1War, avgb2War, avgb3War, avgssWar, avglfWar, avgcfWar, avgrfWar, avgdhWar)
console.log(overallWARdata)


Highcharts.chart('chart-container', {
    chart: {
        type: 'bar'
    },
    title: {
        text: 'Average Wins-Above-Replacement by Position for all Hall of Fame Nominated Players, 2018-2020'
    },
    subtitle: {
        text: 'Source: baseballreference.com'
    },
    xAxis: {
        categories: ['Pitcher', 'First Base', 'Second Base', 'Third Base', 'Shortstop', 'Left Field', 'Center Field', 'Right Field', 'Designated Hitter'],
        title: {
            text: 'Primary Position'
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Average WAR',
            align: 'high'
        },
        labels: {
            overflow: 'justify'
        }
    },
    tooltip: {
        valueSuffix: ' wins above replacement'
    },
    plotOptions: {
        bar: {
            dataLabels: {
                enabled: true
            }
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'top',
        x: -40,
        y: 80,
        floating: true,
        borderWidth: 1,
        backgroundColor:
            Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
        shadow: true
    },
    credits: {
        enabled: false
    },
    series: [{
        name: 'Average WAR',
        data: overallWARdata
    }]
});






</script>
