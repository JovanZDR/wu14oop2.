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



if (count($ds->players) < 2) {
  echo(json_encode(false));
  exit;
}
