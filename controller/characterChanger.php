<?php
echo 'I`m character changer';
require_once 'character.php';


myDebugger($_POST);
if(key_exists('towns', $_POST)) {
    $newCharacter->changeNameOfCharacter($_POST['NameOfCharacter']);

    $database = \graph\database\singleConnectionToDB::getInstance();

    $forSQL = '';
    foreach ($_POST['towns'] as $town) {
        $forSQL .= '(' .
            '\'' . $town . '\'' . ', ' . '\'' . ROUTE[1] . '\'' . ')' . ',';
    }

    $forSQL = mb_substr($forSQL, 0, -1);
    $sql2 = "INSERT INTO friendship
        (id_town, id_character)
        VALUES $forSQL ";

    $database->query($sql2);
}


header("HTTP/1.1. 301 Moved Permanently");
$string = "Location: /graph.loc/";
header("$string");
