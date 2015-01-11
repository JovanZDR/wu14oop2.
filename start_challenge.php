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


if($companionIndex == 1){
	$random_index_number = rand(1,2);
	$companion = $ds->characters[$random_index_number];
		if ($random_index_number = 1 ) {
			$oponent = $ds->characters[2];
		}else{
			$oponent = $ds->characters[1]; 
		}

	}

 