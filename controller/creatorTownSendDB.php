<?php
$database = \database\singleConnectionToDB::getInstance();
$goods = json_encode($_POST['characters'], JSON_UNESCAPED_UNICODE);

$sql = "INSERT INTO town
(name, map, coordinateX, coordinateY)
VALUES (" .

    '\''. $_POST['townName']. '\''.', ' .
    '\''. $_POST['map']. '\''.', ' .
    '\''. $_POST['coordinateX']. '\''.', ' .
    '\''. $_POST['coordinateY']. '\''.
      ")";


$newQuery = $database->query($sql);
header("HTTP/1.1. 301 Moved Permanently");
$string = "Location: /graph.loc/";
header("$string");