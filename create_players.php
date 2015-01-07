<?php


//if (isset($_REQUEST["["characterName"]"])&&isset($_REQUEST["["characterName"]"])) {
	//grab data from AJAX
//	$playerName = $_REQUEST["characterName"];
//	$playerClass = $_REQUEST["characterClass"];
//} else {
//
//	$playerAndClass[] = $playerClass;
//	$playerAndClass[] = $playerName;
//	echo(json_encode($playerAndClass));
	
//	exit();
//}


include_once("nodebite-swiss-army-oop.php");

$ds = new DBObjectSaver(array(
  "host" => "127.0.0.1",
  "dbname" => "wu14oopTenta",
  "username" => "root",
  "password" => "mysql",
  "prefix" => "wu14oopTenta",
));

//empty database
//unset($ds->characters);
//store a reference to the $ds property we're working with
//$characters = &$ds->characters;

//create a class for the hooman
//$characters[] = New $playerClass($playerName);

//$characters[] = New Kobebryant("Kobe");
//$characters[] = New Lebronjames("Lebron");



if (isset($_REQUEST["characterName"]) && isset($_REQUEST["characterClass"])) {
	$humanName = $_REQUEST["characterName"];
	$humanClass = $_REQUEST["characterClass"];
	if (count($ds->character[0]) === 0) {
		$ds->character[] = new $humanClass($humanName);
		$character = &$ds->character[0];
		$human_val_now = array(
			"name" => $character->name,
			"shootStrength" => $character->shootStrength, 
			"layupStrength" => $character->layupStrength, 
			"reboundStrength" => $character->reboundStrength,
			"defenceStrength" => $character->defenceStrength,
			"success" => $character->success
						
		);
		echo(json_encode($human_val_now));
	} else {
		$character = &$ds->character[0];
	}
}