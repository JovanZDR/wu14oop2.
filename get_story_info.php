<?php

	if (!isset($_REQUEST["game_id"])) {
		echo(json_encode(false));
		exit();
	}else{
		$game_id = $_REQUEST["game_id"];
	}
	$game_data_path = "./story-".$game_id;

	$story_data = file_get_contents($game_data_path."/story.json");
	echo($story_data);