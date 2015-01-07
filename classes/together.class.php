<?php

class Together extends Character {
	public $members = array();
	public $shoot;
	public $layup;
	public $rebound;
	public $defence;
	public $items; 

	public function __construct($name, $humanPlayer, $computerPlayer){
		$this->members[] = $computerPlayer;
		$this->members[] = $humanPlayer;

		$this->shootStrength = $computerPlayer->shootStrength + $humanPlayer->shootStrength;
		$this->layupStrength = $computerPlayer->layupStrength + $humanPlayer->layupStrength;
		$this->reboundStrength = $computerPlayer->reboundStrength + $humanPlayer->reboundStrength;
		$this->defence = $computerPlayer->defence + $humanPlayer->defence;

		$this->items = $humanPlayer->items;

		parent::__construct($name);
	}
}
