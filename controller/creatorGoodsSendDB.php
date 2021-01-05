<?php
$newConnection = \database\singleConnectionToDB::getInstance();
$sql = "INSERT INTO goods
(name)
VALUES (" .

'\''. $_POST['NameOfGoods']. '\'' .
")";
$newQuery = $newConnection->query($sql);
header("HTTP/1.1. 301 Moved Permanently");
$string = "Location: /graph/";
header("$string");
