<?php

include_once("nodebite-swiss-army-oop.php");


$ds = new DBObjectSaver(array(
  "host" => "127.0.0.1",
  "dbname" => "the_collector",
  "username" => "root",
  "password" => "mysql",
  "prefix" => "the_collector",
));




//$current_player = &$ds->players[0];

//$current_player_stats = array(
 //   "health" => $current_player->health,
  //  "level" => $current_player->level,
   // "awareness" => $current_player->awareness,
  //  "items" => $current_player->items,
 // );

//$status_to_echo = array(
 // "story" => &$ds->story,
 // "players" => &$ds->players,
 // "current_player_stats" => $current_player_stats,
  //"chapters" => &$ds->chapters,
 // "game_data" => &$ds->game_data,
//);

//echo(json_encode($status_to_echo));