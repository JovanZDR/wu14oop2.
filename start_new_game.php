<?php

include_once("nodebite-swiss-army-oop.php");

$ds = new DBObjectSaver(array(
  "host" => "127.0.0.1",
  "dbname" => "wu14oopTenta",
  "username" => "root",
  "password" => "mysql",
  "prefix" => "wu14oopTenta",
));


unset($ds->challenges);
unset($ds->items);
unset($ds->characters);

 $challenges = &$ds->challenges;
 $items = &$ds->items;
 $characters = &$ds->characters;

if (isset($_REQUEST["characterName"]) && isset($_REQUEST["characterClass"])) {
	$humanName = $_REQUEST["characterName"];
	$humanClass = $_REQUEST["characterClass"];
//	if (count($ds->character[0]) === 0) {
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
		//echo(json_encode($human_val_now));
	//} else {
	//	$character = &$ds->character[0];
	}
}





$challenges[] = new Challenge(
  "You are in Karlskrona. There is a lot of wind. 
  Playing basketball in Karlskrona can be very hard, 
  there is a lot of wind today",
  array(
    "shoot" => 50,
    "layup" => 60,
    "rebound" => 40,
    "defence" => 0
  )
);
$challenges[] = new Challenge(
  "You are in Lund. 
  Playing basketball in Lund can be very tough, 
  there are many wild people in the audience",
  array(
    "shoot" => 50,
    "layup" => 60,
    "rebound" => 40,
    "defence" => 0
  )
);
$challenges[] = new Challenge(
  "You are in Ystad. 
  Playing basketball in Ystad can be really fun if you are well prepared. 
  Ystad is very sharming city",
  array(
    "shoot" => 50,
    "layup" => 60,
    "rebound" => 0,
    "defence" => 40
  )
);
$challenges[] = new Challenge(
  "You are in Copenhagen. 
  Playing basketball in Copenhagen can be really fun if you are well prepared. 
  Copenhagen is very sharming city",
  array(
    "shoot" => 50,
    "layup" => 60,
    "rebound" => 0,
    "defence" => 40
  )
);
$challenges[] = new Challenge(
  "You are in Stockholm. There is a lot of snow. 
  Playing basketball in Stockholm can be very hard, 
  especially in winter",
  array(
    "shoot" => 80,
    "layup" => 30,
    "rebound" => 40,
    "defence" => 0
  )
);
$challenges[] = new Challenge(
  "You are in Oslo. 
  Playing basketball in Oslo can be really fun if you are well prepared. 
  Oslo is very sharming city",
  array(
    "shoot" => 50,
    "layup" => 60,
    "rebound" => 0,
    "defence" => 40
  )
);
$challenges[] = new Challenge(
  "You are in Lomma. 
  Playing basketball in Lomma can be really fun if you are well prepared. 
  Lomma is very sharming city",
  array(
    "shoot" => 50,
    "layup" => 60,
    "rebound" => 0,
    "defence" => 40
  )
);
$challenges[] = new Challenge(
  "You are in Helsinborg. 
  Playing basketball in Helsinborg can be really fun if you are well prepared. 
  Helsinborg is very sharming city",
  array(
    "shoot" => 50,
    "layup" => 60,
    "rebound" => 0,
    "defence" => 40
  )
);
$challenges[] = new Challenge(
  "You are in Goteborg. 
  Playing basketball in Goteborg can be really fun if you are well prepared. 
  Goteborg is very sharming city",
  array(
    "shoot" => 50,
    "layup" => 60,
    "rebound" => 0,
    "defence" => 40
  )
);
$challenges[] = new Challenge(
  "You are in Malmo. 
  Playing basketball in Malmo can be really fun if you are well prepared. 
  Malmo is very sharming city",
  array(
    "shoot" => 50,
    "layup" => 60,
    "rebound" => 0,
    "defence" => 40
  )
);


//$random_number = rand(0, count($challenges)-1);
//$random_challenge = $challenges[$random_number];
//$characters[0]->challenges[] = $random_challenge;

//var_dump($characters);
//var_dump($challenges);




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
 
//$random_index = rand(0, count($items)-1);
//$random_tool = $items[$random_index];
//$characters[0]->items[] = $random_tool;

//var_dump($characters);

