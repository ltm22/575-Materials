<?php
class Pitching extends Base {
	public $id;
	public $player_id;
	public $position_id;
	public $wins;
	public $losses;
	public $ERA;
	public $WHIP;
	public $games;
	public $gamesStarted;
	public $saves;
	public $inningsPitched;
	public $hits;
	public $homeruns;
	public $walks;
	public $strikeouts;

	function __construct() {
	    $this->table = 'pitcherStats';
	  }
}
