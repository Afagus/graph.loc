<?php
echo 'I`m character changer';
require_once 'character.php';

$newCharacter->changeNameOfCharacter($_POST['NameOfCharacter']);


header("HTTP/1.1. 301 Moved Permanently");
$string = "Location: /graph.loc/";
header("$string");
