<?php

include_once("nodebite-swiss-army-oop.php");


$ds = New DBObjectSaver(array(
  "host" => "127.0.0.1",
  "dbname" => "wu14oop2",
  "username" => "root",
  "password" => "mysql",
  "prefix" => "wu14oop2",
));



$companion_index = isset($_REQUEST["companionIndex"]) ? $_REQUEST["companionIndex"] : false;



if (count($ds->characters) < 2) {
  echo(json_encode(false));
  exit;
}
$human_player = $ds->characters[0];


if($companionIndex){
	$random_index_number = rand(1,2);
	$companion = $ds->characters[$random_index_number];
		if ($random_index_number = 1 ) {
			$opponent = $ds->characters[2];
		}else{
			$opponent = $ds->characters[1]; 
		}
	$human_player->success -= 5;
  	$companion->success -= 5;

  
  	$characters = array();
  	$players[] = New Together($human_player, $companion);

  	$characters[] = $opponent;

  
  	$result = $human_player->doChallengeWithFriend($ds->current_challenge[0],$characters);

  
  	$winner = $result[0];
  	$last = $result[count($result)-1];
  		if (get_class($winner) == "Together") {

	    $human_player->success += 9;
	    $companion->success += 9;

	   
	    $opponent->success -= 5;
	  //  $opponent->loseTool($ds->available_items);

		}
} 	else {
  
	  $result = $human_player->acceptChallenge($ds->current_challenge[0], $ds->characters);

	  
	  $winner = $result[0];
	  $last = $result[count($result)-1];

	 
	  $winner->success += 15;


	  $last->success -= 5;
	//  $last->loseTool($ds->available_items);
	}



$echo_data = array(
  "result" => $result,
  "playing" => $ds->characters,
);

echo(json_encode($echo_data));

 