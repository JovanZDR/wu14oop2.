<?php

include_once("nodebite-swiss-army-oop.php");


$ds = new DBObjectSaver(array(
  "host" => "127.0.0.1",
  "dbname" => "wu14oop2",
  "username" => "root",
  "password" => "mysql",
  "prefix" => "wu14oop2",
));

$challenges = &$ds->challenges;

if (isset($_REQUEST["changeChallenge"])) {
	$old_number = $_REQUEST["changeChallenge"]; //should be replaced with data from $_REQUEST
	$random_number = $old_number;
	while ($random_number == $old_number) {
		$random_number = rand(0, count($challenges)-1);
	}
} else {
	$random_number = rand(0, count($challenges)-1);
}
$random_challenge = $challenges[$random_number];
echo(json_encode(array("random_challenge" => $random_challenge, "random_number" => $random_number)));