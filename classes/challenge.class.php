<?php

class Challenge {

	public $description;
	public $skills;

	public function __construct ($description, $skills) {
		$this->description = $description;
		$this->skills = $skills;
	}

	public function howGoodAMatch($character){
		$sum = 0;
		$max = 0;

		foreach ($this->skills as $skill => $points) {
			$needed = $points;
			$has = $character->{$skills."Strength"};

			if($character(count($items)) > 0) {
				for ($i=0; $i < count($character->items) ; $i++) { 
					foreach ($character>$items[$i]->skills as $ItemSkill => $value) {
							if ($ItemSkill == $skill) {
								$has +=$value;
							}
					}	
				}
			}
		}

		$sum += $has > $needed ? $needed : $has ; $max += $needed;

	}

	public function winChances($characters) {
		$matches = array();
		$count = 0;

		foreach ($characters as $character) {
			$howGoodAMatch = $this->howGoodAMatch($character);

			$matches[] = array(
				"character" => $character,
				"howGoodAMatch" => $howGoodAMatch,
				);
			$count += $howGoodAMatch;
		}
		foreach ($matches as &$match) {
			$match["winChancePercent"] = round(100*($match["howGoodAMatch"]/$count));
		}
		return $matches;
	}

	public function playChallenge() {
		$matches = $this->winChances($characters);
		$count = 0;
		$rand = rand(0,100);

		foreach ($matches as $match) {
			if ($rand >= $count && $rand < $match[$winChancePercent] + $count) {
				return $match[$character];
			}
			$count += $match["winChancePercent"];
		}
	}

}
$challenges = array();
$characters = array();


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


$random_number = rand(0, count($challenges)-1);
$random_challenge = $challenges[$random_number];
$characters[0]->challenges[] = $random_challenge;

var_dump($characters);





