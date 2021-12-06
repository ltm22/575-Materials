<?php
class Player extends Base {
	public $id;
	public $name;

	function __construct() {
	    $this->table = 'players';
	  }
}
