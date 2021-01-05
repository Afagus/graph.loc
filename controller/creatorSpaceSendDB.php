<?php

$newConnection = \database\singleConnectionToDB::getInstance();
$sql = "INSERT INTO map
(name, xSize, ySize)
VALUES (" .

    '\''. $_POST['mapName']. '\''.', ' .
    '\''. $_POST['xSize']. '\''.', ' .
    '\''. $_POST['ySize']. '\''.
    ")";
$newQuery = $newConnection->query($sql);
header("HTTP/1.1. 301 Moved Permanently");
$string = "Location: /graph/";
header("$string");