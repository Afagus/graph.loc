<?php
require_once 'database/singleConnectionToDB.php';


$database = \graph\database\singleConnectionToDB::getInstance();
$characters = json_encode($_POST['characters'], JSON_UNESCAPED_UNICODE);

$sql = "INSERT INTO town
(name, map, coordinateX, coordinateY)
VALUES (" .

    '\'' . $_POST['townName'] . '\'' . ', ' .
    '\'' . $_POST['map'] . '\'' . ', ' .
    '\'' . $_POST['coordinateX'] . '\'' . ', ' .
    '\'' . $_POST['coordinateY'] . '\'' .
    ")";

$database->query($sql);

        $forSQL = '';
        foreach ($_POST['characters'] as $character) {
            $forSQL .= '(' .
                '\'' . $database->getLastId() . '\'' . ', ' . '\'' . $character . '\'' . ')' . ',';
        }

        $forSQL = mb_substr($forSQL, 0, -1);
        $sql2 = "INSERT INTO friendship
        (id_town, id_character)
        VALUES $forSQL ";

        $database->query($sql2);

header("HTTP/1.1. 301 Moved Permanently");
$string = "Location: /graph.loc/";
header("$string");