<?php
$database = \database\singleConnectionToDB::getInstance();
$goods = json_encode($_POST['goods'], JSON_UNESCAPED_UNICODE);

$sql = "INSERT INTO shop
(name, toMap, coordinateX, coordinateY, goods)
VALUES (" .

    '\''. $_POST['shopName']. '\''.', ' .
    '\''. $_POST['toMap']. '\''.', ' .
    '\''. $_POST['coordinateX']. '\''.', ' .
    '\''. $_POST['coordinateY']. '\''.', ' .
    '\''. $goods. '\''.
    ")";
$newQuery = $database->query($sql);
header("HTTP/1.1. 301 Moved Permanently");
$string = "Location: /graph/";
header("$string");