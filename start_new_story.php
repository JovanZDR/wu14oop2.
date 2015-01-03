<?php

	if(!isset($_REQUEST["game_id"])|| $isset($_REQUEST["create_player"])) {
		echo(json_encode(false));
			exit();
	}else{
		$game_id = $_REQUEST["game_id"];
		$create_player = $_REQUEST["create_player"];
	}

	$game_data_path = "./story-". $game_id;

	include_once("nodebite-swiss-army-oop.php");

	$ds = new DBObjectSaver(array(
	  "host" => "127.0.0.1",
	  "dbname" => "the_collector",
	  "username" => "root",
	  "password" => "mysql",
	  "prefix" => "the_collector",
	));

	unset($ds->story);
	unset($ds->palyers);
	unset($ds->chapters);
	unset($ds->game_data);

	$story = &$ds->story;
	$players = &$ds->players;
	$chapters = &$ds->chapters;
	$game_data = &$ds->game_data;

	$story_data = file_get_contents($game_data_path."/story.json");
	if (!$story_data) {
	  echo("WHERE IS MY STORY?! ".$game_data_path);
	  exit();
	}
	$story["story_data"] = json_decode($story_data, true);

	for ($i = 0; $i < $story["story_data"]["chapters"]; $i++) {
  
	  	$current_file_path = $game_data_path."/chapter-$i/story.json";

	  	if (file_exists($current_file_path)) {
		    $chapter_data = file_get_contents($current_file_path);
		    $chapters[] = json_decode($chapter_data, true);
	  	} else {
	    
	    	$chapters[] = NULL;
	    break;
  		}
	}

	$requested_player_class = ucfirst($create_player["class"]);

	$requested_player_name = ucfirst($create_player["name"]);


	$new_player = New $requested_player_class($requested_player_name);
 	$players[] = &$new_player;

 	$game_data["current_chapter"] = 0;
	$game_data["current_chapter_event"] = array();
	$game_data["player"] = $new_player;
	$game_data["collected_items"] = array();

	$story_echo_data = array(
	  "message" => "Started new story!",
	  "story" => &$story,
	  "players" => &$players,
	  "chapters" => &$chapters,
	  "game_data" => &$game_data,
	);

  echo(json_encode($story_echo_data));