<?php
require_once 'database/singleConnectionToDB.php';

$id_character= ROUTE[1];
$id_town= ROUTE[2];

echo $id_character;
echo '<br>';
echo $id_town;

$newConnection = \graph\database\singleConnectionToDB::getInstance();
$sql = "DELETE FROM friendship
             WHERE id_character = " . $id_character . " AND id_town = " . $id_town;
$newQuery = $newConnection->query($sql);




header("Location: ".$_SERVER['HTTP_REFERER']);