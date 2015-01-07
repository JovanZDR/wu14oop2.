<?php


include_once("nodebite-swiss-army-oop.php");

$ds = new DBObjectSaver(array(
  "host" => "127.0.0.1",
  "dbname" => "wu14oopTenta",
  "username" => "root",
  "password" => "mysql",
  "prefix" => "wu14oopTenta",
));

$characters = &$ds->characters;

if (count($characters) === 0) {
	echo(json_encode(false));
	exit();
}

$stuff_to_echo = array();

for ($i = 0; $i < count($characters); $i++) {
	$stuff_to_echo[] = $characters[$i]->name;	
}

echo(json_encode($stuff_to_echo));