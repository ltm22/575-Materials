<?php
class Career extends Base {
	public $id;
	public $player_id;
	public $position_id;
	public $yearsPlayed;
	public $WAR;
	public $WAR7;
	public $JAWS;
	public $JPos;

	function __construct() {
	    $this->table = 'performanceStats';
	  }
}
