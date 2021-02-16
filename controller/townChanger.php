<?php
require_once 'database/singleConnectionToDB.php';


$database = \graph\database\singleConnectionToDB::getInstance();
$characters = json_encode($_POST['characters'], JSON_UNESCAPED_UNICODE);
$sep = '\'';
$sql = "UPDATE town
        SET name = $sep{$_POST['townName']}$sep, 
            map = {$_POST['map']}, 
            coordinateX = {$_POST['coordinateX']}, 
            coordinateY= {$_POST['coordinateY']}
        WHERE id = ". ROUTE[1];


$database->query($sql);

$forSQL = '';
foreach ($_POST['characters'] as $character) {
    $forSQL .= '(' .
        '\'' . ROUTE[1] . '\'' . ', ' . '\'' . $character . '\'' . ')' . ',';
}

$forSQL = mb_substr($forSQL, 0, -1);
$sql2 = "INSERT INTO friendship
        (id_town, id_character)
        VALUES $forSQL ";

$database->query($sql2);

myDebugger($_POST);
echo ROUTE[1];

header("HTTP/1.1. 301 Moved Permanently");
$string = "Location: /graph.loc/";
header("$string");
