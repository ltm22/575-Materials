<?php
class Position extends Base {
	public $id;
	public $position;

	function __construct() {
	    $this->table = 'primaryPosition';
	  }
}
