<?php
require_once 'database/singleConnectionToDB.php';

$newConnection = \graph\database\singleConnectionToDB::getInstance();
$sql = "INSERT INTO characters
(name)
VALUES (" .

    '\'' . $_POST['NameOfCharacter'] . '\'' .
    ")";
$newConnection->query($sql);

$forSQL = '';
foreach ($_POST['friendshipTowns'] as $friendshipTown) {

    $forSQL .= '('
          . $friendshipTown .  ', ' .$newConnection->getLastId() .')' . ',';
}

$forSQL = mb_substr($forSQL, 0, -1);
$sql2 = "INSERT INTO friendship
        (id_town, id_character)
        VALUES $forSQL ";



$newConnection->query($sql2);


header("HTTP/1.1. 301 Moved Permanently");
$string = "Location: /graph.loc/";
header("$string");
