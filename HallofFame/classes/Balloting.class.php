<?php
class Balloting extends Base {
	public $id;
	public $player_id;
	public $position_id;
	public $yearOnBallot;
	public $votes;
	public $votePct;
	public $inducted;

	function __construct() {
	    $this->table = 'mostRecentBalloting';
	  }
}
