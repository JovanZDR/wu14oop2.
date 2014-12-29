<?php

class Player extends Base {

	public $name;

	public $shoot;
	public $layup;
	public $rebound;
	public $defence;

	public $success = 50;

	public function __construct ($name){
		$this->name = $name;
	}
	public function compete(){
		
	}

	public function isAlive(){
		return $this->success > 0;
	}
}
