<?php

class Character{

	public $name;
	

	public $items = array();

	public $success = 50;

	public function __construct ($name){
		$this->name = $name;
	}
	public function winTool(&$items){


    	if (count($this->items) < 3) {
      
	      $random_item_index = rand(0, count($items)-1);
	      $random_item = $items[$random_item_index];
	      $this->items[] = $random_item;
	      array_splice($items, $random_item_index, 1);
    	}
	}
    //public function looseTool(&$items) {
    
    //	if (count($this->tools) > 0) {
   
    //  		$random_tool = rand(0, count($this->tools)-1);

 
     // 		$lost_item = array_splice($this->items, $random_item, 1);

   
      //		$items[] = $lost_items[0];
    //	}
   // }
    public function acceptChallenge($challenge, $characters) {
    
    	$result = array();
    	while (count($characters) !== 0) {
      		$result[] = $challenge->playChallenge($characters);

     
      		$round_winner_index = array_search($result[count($result)-1], $characters);
      		array_splice($characters, $round_winner_index, 1);
    	}

    	return $result;
  	}
   public function doChallengeWithFriend($challenge, &$characters) {
    
    	return $this->acceptChallenge($challenge, $characters);
  	}
}
