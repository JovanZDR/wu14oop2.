<?php
// We must include files that we are dependent on
// Nodebite comes with an autoloader meaning that
// if our classes are in the classes/ folder we do not 
// need to use include_once() anymore for our class files


//include Nodebite black box (contains autoloader)
include_once("nodebite-swiss-army-oop.php");

//create a new instance of the DBObjectSaver class 
//and store it in the $db variable
$ds = new DBObjectSaver(array(
  "host" => "127.0.0.1",
  "dbname" => "character_db",
  "username" => "root",
  "password" => "mysql",
  "prefix" => "characters_trial"
));

/**
 * to use the DBObjectSaver class we need to do two things
 * 1. check if a DBObjectSaver property has anything in its array
 * 2. if not, put something in its array
 *
 * to make our lives easier we can also choose to create a
 * variable with a reference to a DBObjectSaver property
 * which you will see three examples of below.
 *
 */

/**
 * Set up tracking of important variables
 *
 */

//DBObjectSaver always returns an array even for properties
//that have not been used by us yet using a getter (__get()). 
//therefor any property we request will always be set meaning
//isset() will always return true. Therefore only use count().

//Tracking of a monster
//Did we load a monster or should we make a new one?
//if we did not load any monsters from the DB
if (!count($ds->monsters)) {
  //create new monster
  $hugo = New Monster("Hugo");

  //create new weapon for monster
  $hugos_weapon = New Weapon($hugo);

  //start tracking monster instance
  $ds->monsters[] = $hugo;
}
//elseif we did load any monsters from the DB
else {
  //store a reference to $ds->monsters[0] in the variable $hugo
  $hugo = &$ds->monsters[0];
}

//Tracking of a hero
//Did we load a hero or should we make a new one?
//if we did not load any heroes from the DB
if (!count($ds->heroes)) {
  //create new hero
  $susanne = New Hero("Susanne");

  //create new weapon for hero
  $susannes_weapon = New Weapon($susanne);

  //track hero class instance
  $ds->heroes[] = $susanne;
}
//elseif we did load any heroes from the DB
else {
  //store a reference to $ds->heroes[0] in the variable $susanne
  $susanne = &$ds->heroes[0];
}

//Tracking of a story
//Did we load a story or should we make a new one?
//if we did not load any story from the DB
if (!count($ds->story)) {
  //create new story
  $story = array(
      "storyLine" => array(),
      "options" => array(),
    );

  //track story array
  //we don't have to push $story into the
  //$ds->story array simply because $story
  //already is an array
  $ds->story = $story;

  //create new variables with references to
  //$ds->story property array keys
  $story = &$ds->story["storyLine"];
  $options = &$ds->story["options"];
}
//elseif we did load any story from the DB
else {
  //store a reference to $ds->story["storyLine"] in the 
  //variable $story and a reference to $ds->story["options"] 
  //in the variable $options
  $story = &$ds->story["storyLine"];
  $options = &$ds->story["options"];
}

//End of tracking setup...





//start of actual game code
if (!count($story)) {
  //if we are starting a new story,
  //make available two simple options
  $options["monster_attack"] = true;
  $options["hero_potion"] = true;
}
//if susanne has no potions, remove that option
if (!$susanne->has_potions_left()) {
  $options["hero_potion"] = false;
}

//if hugo has no monster strikes left, 
//remove that option
if (!$hugo->can_strike()) {
  $options["monster_attack"] = false;
}



//hugos version of healthCheck
//that can be used on a single character only
function healthCheck($character){
  //all echoes have been removed to make this PHP file silent
  //so that AJAX only gets the echo we want it to (only valid JSON)

  //replacing echo with a return
  $is_alive = $character->isAlive() ? $character->name." is alive.<br>" : $character->name." is dead.<br>";
  $health = $character->name." health: ".$character->health.'<br>';

  return $is_alive.$health;
}


//before this specific part of the story happens,
//check if we recieved any options
if (isset($_REQUEST["selectedOption"])) {
  //was hugo told to use monster strike?
  if ($_REQUEST["selectedOption"] == "monster_attack") {
    //THEN STRIKE THEM HEROES DOWN!
    $hugo->monster_strike = true;
  }
  //was susanne told to use a potion?
  elseif ($_REQUEST["selectedOption"] == "hero_potion") {
    //THEN RISE OH MONSTER SLAYER!
    $story[] = $susanne->drink_potion();
  }
}


//all functions and methods called directly below return strings
//add new parts of the story onto the $story array()
//ps: $story is a reference to $ds->story
$story[] = $hugo->attack($susanne);
$story[] = healthCheck($susanne);
$story[] = $susanne->attack($hugo);
$story[] = healthCheck($susanne);






//here we combine out $story and $options into one array
//which is then turned into JSON using json_encode() 
//that we echo out so that AJAX can pick it up clientside
$array_to_echo = array(
    "storyLine" => $story,
    "options" => $options,
  );

echo(json_encode($array_to_echo));
