<?php

include_once("nodebite-swiss-army-oop.php");

$ds = New DBObjectSaver(array(
  "host" => "127.0.0.1",
  "dbname" => "wu14oop2",
  "username" => "root",
  "password" => "mysql",
  "prefix" => "wu14oop2",
));

unset($ds->challenges);
unset($ds->items);
unset($ds->characters);
unset($ds->available_items);

if (isset($_REQUEST["characterName"]) && isset($_REQUEST["characterClass"])) {
	$humanName = $_REQUEST["characterName"];
	$humanClass = $_REQUEST["characterClass"];

		$ds->characters[] = New $humanClass($humanName);
		$character = &$ds->characters[0];
		$human_val_now = array(
			"name" => $character->name,
			"shootStrength" => $character->shootStrength, 
			"layupStrength" => $character->layupStrength, 
			"reboundStrength" => $character->reboundStrength,
			"defenceStrength" => $character->defenceStrength,
			"success" => $character->success

						
		);
		
	}else{
		echo(json_encode(false));
		exit();
	}
echo(json_encode($human_val_now));

$all_classes = array("Kobebryant", "Lebronjames", "Michaeljordan");
for ($i=0; $i < count($all_classes); $i++) { 
  if ($all_classes[$i] != $humanClass) {
    $ds->characters[] = New $all_classes[$i]("Comp".$i);
  }
}



 $challenges = &$ds->challenges;
 $items = &$ds->items;
 $characters = &$ds->characters;






$challenges[] = New Challenge(
  "You are in Karlskrona. There is a lot of wind. 
  Playing basketball in Karlskrona can be very hard, 
  there is a lot of wind today. You need to have the following skills if you want to win.",
  array(
    "shoot" => 50,
    "layup" => 60,
    "rebound" => 40,
    "defence" => 0,
  )
);
$challenges[] = New Challenge(
  "You are in Lund. 
  Playing basketball in Lund can be very tough, 
  there are many wild people in the audience. You need to have the following skills if you want to win.",
  array(
    "shoot" => 50,
    "layup" => 60,
    "rebound" => 40,
    "defence" => 0,
  )
);
$challenges[] = New Challenge(
  "You are in Ystad. 
  Playing basketball in Ystad can be really fun if you are well prepared. 
  Ystad is very sharming city. You need to have the following skills if you want to win.",
  array(
    "shoot" => 50,
    "layup" => 60,
    "rebound" => 0,
    "defence" => 40,
  )
);
$challenges[] = New Challenge(
  "You are in Copenhagen. 
  Playing basketball in Copenhagen can be really fun if you are well prepared. 
  Copenhagen is very sharming city. You need to have the following skills if you want to win.",
  array(
    "shoot" => 50,
    "layup" => 60,
    "rebound" => 0,
    "defence" => 40,
  )
);
$challenges[] = New Challenge(
  "You are in Stockholm. There is a lot of snow. 
  Playing basketball in Stockholm can be very hard, 
  especially in winter. You need to have the following skills if you want to win.",
  array(
    "shoot" => 80,
    "layup" => 30,
    "rebound" => 40,
    "defence" => 0,
  )
);
$challenges[] = New Challenge(
  "You are in Oslo. 
  Playing basketball in Oslo can be really fun if you are well prepared. 
  Oslo is a very sharming city. You need to have the following skills if you want to win.",
  array(
    "shoot" => 50,
    "layup" => 60,
    "rebound" => 0,
    "defence" => 40,
  )
);
$challenges[] = New Challenge(
  "You are in Lomma. 
  Playing basketball in Lomma can be really fun if you are well prepared. 
  Lomma is a very sharming city. You need to have the following skills if you want to win.",
  array(
    "shoot" => 30,
    "layup" => 60,
    "rebound" => 20,
    "defence" => 40,
  )
);
$challenges[] = New Challenge(
  "You are in Helsinborg. 
  Playing basketball in Helsinborg can be really fun if you are well prepared. 
  Helsinborg is a very sharming city. You need to have the following skills if you want to win.",
  array(
    "shoot" => 10,
    "layup" => 60,
    "rebound" => 0,
    "defence" => 80,
  )
);
$challenges[] = New Challenge(
  "You are in Goteborg. 
  Playing basketball in Goteborg can be really fun if you are well prepared. 
  Goteborg is a very sharming city. You need to have the following skills if you want to win.",
  array(
    "shoot" => 30,
    "layup" => 60,
    "rebound" => 0,
    "defence" => 60,
  )
);
$challenges[] = New Challenge(
  "You are in Malmo. 
  Playing basketball in Malmo can be really fun if you are well prepared. 
  Malmo is a very sharming city. You need to have the following skills if you want to win.",
  array(
    "shoot" => 50,
    "layup" => 100,
    "rebound" => 0,
    "defence" => 0,
  )
);










$item_properties = array(
  array("description" => "Socks", 
    "skills" => array("shoot" => 40, 
    ),
  ),
  array("description" => "Tape", 
    "skills" => array("layup" => 20, 
    ),
  ),
  array("description" => "Water", 
    "skills" => array("defence" => 30, 
    ),
  ),
  array("description" => "Gatorade", 
    "skills" => array("rebound" => 20, 
    ),
  ),
  array("description" => "Pepsi", 
    "skills" => array("shoot" => 10, 
    ),
  ),
  array("description" => "Shoes", 
    "skills" => array("layup" => 30, 
    ),
  ),
  array("description" => "Lemonade", 
    "skills" => array("rebound" => 10, 
    ),
  ),
  array("description" => "Sandwich", 
    "skills" => array("layup" => 20, 
    ),
  ),
   array("description" => " Chocolate", 
    "skills" => array("layup" => 10, 
    ),
  ),
);
$random_item = $item_properties[rand(0, count($item_properties)-1)];
 
$ds->available_items[] = New Item($random_item["description"],$random_item["skills"]);




