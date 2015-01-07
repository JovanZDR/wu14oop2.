<?php

include_once("nodebite-swiss-army-oop.php");

$ds = new DBObjectSaver(array(
  "host" => "127.0.0.1",
  "dbname" => "the_collector",
  "username" => "root",
  "password" => "mysql",
  "prefix" => "the_collector",
));





//if (isset($_REQUEST["startOver"])) {
  //unset($ds->story);
 // unset($ds->players);
 // unset($ds->chapters);
 // unset($ds->game_data);
//}

//echo(json_encode(true));