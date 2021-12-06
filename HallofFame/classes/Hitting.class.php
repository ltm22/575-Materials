<?php
class Hitting extends Base {
	public $id;
	public $player_id;
	public $position_id;
	public $games;
	public $atbats;
	public $runs;
	public $hits;
	public $homeruns;
	public $rbis;
	public $steals;
	public $walks;
	public $battingAverage;
	public $onBasePercentage;
	public $slug;
	public $OPS;

	function __construct() {
	    $this->table = 'hitterStats';
	  }
}
