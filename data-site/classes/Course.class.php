<?php
class Course extends Base {
	public $id;
	public $name;
	public $description;
	public $table;

	function __construct() {
	    $this->table = 'courses';
	  }
}
