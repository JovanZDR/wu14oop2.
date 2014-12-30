<?php

class Player  {

	public $name;

	public $shoot;
	public $layup;
	public $rebound;
	public $defence;

	public $success = 50;

	public function __construct ($name){
		$this->name = $name;
	}
	
}
