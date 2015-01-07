<?php

class Character{

	public $name;
	

	public $items = array();

	public $success = 50;

	public function __construct ($name){
		$this->name = $name;
	}
}
var_dump($characters);