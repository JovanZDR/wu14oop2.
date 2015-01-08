<?php

include_once("nodebite-swiss-army-oop.php");


$ds = new DBObjectSaver(array(
  "host" => "127.0.0.1",
  "dbname" => "wu14oop2",
  "username" => "root",
  "password" => "mysql",
  "prefix" => "wu14oop2",
));



 $items = &$ds->items;

 if (isset($_REQUEST["changeItem"])) {
	$old_item_number = $_REQUEST["changeItem"]; //should be replaced with data from $_REQUEST
	$random_item_number = $old_item_number;
	while ($random_item_number == $old_item_number) {
		$random_item_number = rand(0, count($items)-1);
	}
} else {
	$random_item_number = rand(0, count($items)-1);
}
$random_item = $items[$random_item_number];
echo(json_encode(array("random_item" => $random_item, "random_item_number" => $random_item_number)));