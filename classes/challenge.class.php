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

	public function playChallenge($characters) {
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
