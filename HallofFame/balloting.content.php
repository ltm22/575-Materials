<?php
$db = new Database();

$session = new Session();
$loggedIn = $session->checkLoginStatus();

$caption = 'Career Statistics';
$headers = array('ID', 'Name', 'Position', 'Year', 'Years on Ballot', 'Votes', 'Vote Percentage', 'Inducted?');

$bSql = '
SELECT
	`b`.`id`,
	`p`.`name`,
	`pp`.`position`,
	`b`.`year`,
	`b`.`yearOnBallot`,
	`b`.`votes`,
	`b`.`votePct`,
	`b`.`inducted`
FROM `mostRecentBalloting` AS `b`
LEFT JOIN `players` AS `p`
ON `b`.`player_id` = `p`.`id`
LEFT JOIN `primaryPosition` AS `pp`
ON `pp`.`id` = `b`.`position_id`';

$ballotStats = $db->object('Balloting', $bSql);

$tableRows = array();
$positions = array();
$counter = 0;

	foreach ($ballotStats as $ballotStat) {
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

		$tableRows[$counter][] = $ballotStat->id;
		$tableRows[$counter][] = $ballotStat->name;
		$tableRows[$counter][] = $ballotStat->position;
		$tableRows[$counter][] = $ballotStat->year;
		$tableRows[$counter][] = $ballotStat->yearOnBallot;
		$tableRows[$counter][] = $ballotStat->votes;
		$tableRows[$counter][] = $ballotStat->votePct;
		$tableRows[$counter][] = $ballotStat->inducted;

		// Table for vis.
		$positions[$counter] = $ballotStat->position;

		$counter++;
	}

$data = $tableRows;

$attributes = array('id' => 'ballotTable_id', 'class' => 'ballotTable_class');

include CLASS_PATH . 'UI.class.php'; // if the UI file has not been included yet
$ui = new UI(); // if the UI class has not been called yet;


// $postFirstname = $_POST['firstname'];
// $postLastname = $_POST['lastname'];
// $postEmail = $_POST['email'];

$table = $ui->simpleTable($caption, $headers, $data, $attributes);
echo '<H3>This page displays a table populated with the most recent (or final) results of the Hall of Fame Ballot for each player nominated between 2018 and 2020.</H3>';
echo '<H4>Below the table, you may find a data visualization displaying the proportion of nominees by each position.</H4>';
echo $table; // this would render a fully complete table
echo '<H3>Pitchers are nominated moreso than any other position, but they do not claim the majority.</H3>';
echo '<H3>Using just career statistics and advanced metrics to predict election results is difficult; oftentimes these decisions are political as well.</H3>';


?>

<div id= 'chart-container'></div>



<script>

var data = <?php echo json_encode($positions); ?>;
console.log(data);

var HiChartData = {};
for (var position of data) {
	console.log(position)
	if (HiChartData[position]) {
		HiChartData[position]++
	}
	else {
		HiChartData[position] = 1;
	}
	console.log(HiChartData)
}

console.log(Object.keys(HiChartData))


var totalNumberOfPlayers = data.length
var positionsFinalData = []
for (var position of Object.keys(HiChartData)) {
	var percentage = HiChartData[position]/totalNumberOfPlayers
	positionsFinalData.push({
		name:position, y:percentage*100
	})
}
console.log(positionsFinalData)


Highcharts.chart('chart-container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Breakdown of Nominated Players to the MLB Hall of Fame by Position, 2018-2020'
    },
		subtitle: {
        text: 'Source: baseballreference.com'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %'
            }
        }
    },
    series: [{
        name: 'Percentage',
        colorByPoint: true,
        data: positionsFinalData
    }
	//
]
});

</script>
