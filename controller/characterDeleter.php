<?php
echo 'I`m character deleter';
require_once 'character.php';
$newCharacter->deleteCharacter();


header("HTTP/1.1. 301 Moved Permanently");
$string = "Location: /graph.loc/";
header("$string");
