<?php

$newConnection = \graph\database\singleConnectionToDB::getInstance();
$sql = "INSERT INTO characters
(name)
VALUES (" .

'\''. $_POST['NameOfCharacter']. '\'' .
")";
$newQuery = $newConnection->query($sql);
header("HTTP/1.1. 301 Moved Permanently");
$string = "Location: /graph.loc/";
header("$string");
