<?php

include_once("nodebite-swiss-army-oop.php");


$ds = new DBObjectSaver(array(
  "host" => "127.0.0.1",
  "dbname" => "wu14oop2",
  "username" => "root",
  "password" => "mysql",
  "prefix" => "wu14oop2",
));








$random_tool = $item_properties[rand(0, count($item_properties)-1)];
 


$ds->available_tools[] = New Item($random_tool);
  

