<?php

include_once("nodebite-swiss-army-oop.php");


$ds = new DBObjectSaver(array(
  "host" => "127.0.0.1",
  "dbname" => "wu14oop2",
  "username" => "root",
  "password" => "mysql",
  "prefix" => "wu14oop2",
));


$last_challenge_index = isset($_REQUEST["changeChallenge"]) ? $_REQUEST["changeChallenge"] : false;




if ($last_challenge_index !== false) {

  $random_challenge_index = $last_challenge_index;
  while ($random_challenge_index == $last_challenge_index) {
    $random_challenge_index = rand(0, count($ds->challenges)-1);
  }
} else {
 
  $random_challenge_index = rand(0, count($ds->challenges)-1);
}


unset($ds->current_challenge);

$ds->current_challenge[] = $ds->challenges[$random_challenge_index];


echo(json_encode($ds->current_challenge[0]));