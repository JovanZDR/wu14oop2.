<?php

class Together extends Character {
	public $members = array();
	public $shootStrength;
	public $layupStrength;
	public $reboundStrength;
	public $defenceStrength;
	public $items; 

	public function __construct($name, $humanPlayer, $computerPlayer){
		$this->members[] = $computerPlayer;
		$this->members[] = $humanPlayer;

		$this->shootStrength = $computerPlayer->shootStrength + $humanPlayer->shootStrength;
		$this->layupStrength = $computerPlayer->layupStrength + $humanPlayer->layupStrength;
		$this->reboundStrength = $computerPlayer->reboundStrength + $humanPlayer->reboundStrength;
		$this->defence = $computerPlayer->defence + $humanPlayer->defence;

	for ($i=0; $i < count($this->members); $i++) { 
    	for ($j=0; $j < count($this->members[$i]->items); $j++) { 
       		$this->items[] = $this->members[$i]->tools[$j];
      	}
    }

		$this->items = $humanPlayer->items;

		parent::__construct($name);
	}
}
