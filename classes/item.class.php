<?php

class Item{
	public $description;
	public $skills;

	public function __construct($description, $skill) {
		$this->description = $description;
		$this->skills = $skills;
	}	
}

$items = array();

$items[] = New Item("Socks", array("shoot" => 40 ,));
$items[] = New Item("Tape", array("layup" => 20 ,));
$items[] = New Item("Water", array("defence" => 30 ,));
$items[] = New Item("Gatorade", array("rebound" => 20 ,));
$items[] = New Item("Pepsi", array("shoot" => 10 ,));
$items[] = New Item("Shoes", array("layup" => 30 ,));
$items[] = New Item("Lemonade", array("rebound" => 10 ,));
$items[] = New Item("Sandwich", array("layup" => 15 ,));
$items[] = New Item("Chocolate", array("shoot" => 10 ,));
$items[] = New Item("Meat", array("defence" => 15 ,));
 
$random_index = rand(0, count($items)-1);
$random_tool = $items[$random_index];
$characters[0]->items[] = $random_tool;

var_dump($characters);
