<?php
$db = new Database();

$session = new Session();
$loggedIn = $session->checkLoginStatus();

// $loggedIn = 1;

$caption = 'Hitting Statistics';
$headers = array('ID', 'Name', 'Position', 'Games', 'At Bats', 'Runs', 'Hits', 'Homeruns', 'RBIs', 'Steals', 'Walks', 'Batting Average', 'OBP', 'Slugging %', 'OPS');

$hpSql = '
SELECT
	`h`.`id`,
	`p`.`name`,
	`pp`.`position`,
	`h`.`games`,
	`h`.`atbats`,
	`h`.`runs`,
	`h`.`hits`,
	`h`.`homeruns`,
	`h`.`rbis`,
	`h`.`steals`,
	`h`.`walks`,
	`h`.`battingAverage`,
	`h`.`onBasePercentage`,
	`h`.`slug`,
	`h`.`OPS`
FROM `hitterStats` AS `h`
LEFT JOIN `players` AS `p`
ON `h`.`player_id` = `p`.`id`
LEFT JOIN `primaryPosition` AS `pp`
ON `pp`.`id` = `h`.`position_id`';

$hitterStats = $db->object('Hitting', $hpSql);

$tableRows = array();
$homeruns = array();
$positions = array();
$counter = 0;

	foreach ($hitterStats as $hitterStat) {
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

		$tableRows[$counter][] = $hitterStat->id;
		$tableRows[$counter][] = $hitterStat->name;
		$tableRows[$counter][] = $hitterStat->position;
		$tableRows[$counter][] = $hitterStat->games;
		$tableRows[$counter][] = $hitterStat->atbats;
		$tableRows[$counter][] = $hitterStat->runs;
		$tableRows[$counter][] = $hitterStat->hits;
		$tableRows[$counter][] = $hitterStat->homeruns;
		$tableRows[$counter][] = $hitterStat->rbis;
		$tableRows[$counter][] = $hitterStat->steals;
		$tableRows[$counter][] = $hitterStat->walks;
		$tableRows[$counter][] = $hitterStat->battingAverage;
		$tableRows[$counter][] = $hitterStat->onBasePercentage;
		$tableRows[$counter][] = $hitterStat->slug;
		$tableRows[$counter][] = $hitterStat->OPS;

		// Table for vis.
		$hitting[$counter][] = $hitterStat->steals;
		$hitting[$counter][] = $hitterStat->homeruns;

		$counter++;
	}

$data = $tableRows;

$attributes = array('id' => 'hittingStatsTable_id', 'class' => 'hittingStatsTable_class');

include CLASS_PATH . 'UI.class.php'; // if the UI file has not been included yet
$ui = new UI(); // if the UI class has not been called yet;


// $postFirstname = $_POST['firstname'];
// $postLastname = $_POST['lastname'];
// $postEmail = $_POST['email'];

$table = $ui->simpleTable($caption, $headers, $data, $attributes);
echo '<H3>This page displays a table populated with the standard career hitting statistics of all non-pitchers nominated to the Hall of Fame from 2018 to 2020.</H3>';
echo '<H4>Below the table, you may find a data visualization comparing career totals in steals and homeruns.</H4>';
echo $table; // this would render a fully complete table

echo '<H3>A null hypothesis one might have is that players with more homeruns (big, slugging men) have fewer total steals, while faster, smaller players might have more steals but fewer homeruns.</H3>';
echo '<H4>However, this pattern does not seem to emerge. It might be true of the average player, but the average player is not nominated. These are perennial all-stars who perform in all categories.</H4>';
?>

<div id= 'chart-container'></div>

<script>

var data = <?php echo json_encode($hitting, JSON_NUMERIC_CHECK); ?>;
console.log(data);

Highcharts.chart('chart-container', {
    chart: {
        type: 'scatter',
        zoomType: 'xy'
    },
    title: {
        text: 'Steals Versus Homeruns of MLB Hall of Fame Nominated Hitters, 2018-2020'
    },
    subtitle: {
        text: 'Source: baseballreference.com'
    },
    xAxis: {
        title: {
            enabled: true,
            text: 'Career Total Steals'
        },
        startOnTick: true,
        endOnTick: true,
        showLastLabel: true
    },
    yAxis: {
        title: {
            text: 'Career Total Homeruns'
        }
    },
    legend: {
        layout: 'vertical',
        align: 'left',
        verticalAlign: 'top',
        x: 100,
        y: 70,
        floating: true,
        backgroundColor: Highcharts.defaultOptions.chart.backgroundColor,
        borderWidth: 1
    },
    plotOptions: {
        scatter: {
            marker: {
                radius: 5,
                states: {
                    hover: {
                        enabled: true,
                        lineColor: 'rgb(100,100,100)'
                    }
                }
            },
            states: {
                hover: {
                    marker: {
                        enabled: false
                    }
                }
            },
            tooltip: {
                headerFormat: '<b>{series.name}</b><br>',
                pointFormat: '{point.x} steals, {point.y} homeruns'
            }
        }
    },
    series: [{
        name: 'Steals by Homeruns',
        color: 'rgba(223, 83, 83, .5)',
        data: data
    }]
});


</script>
