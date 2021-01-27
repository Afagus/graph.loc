<?php

require_once 'loader.php';
require_once 'database/singleConnectionToDB.php';

$connection = \graph\database\singleConnectionToDB::getInstance();
$dbQuery = 'SELECT * FROM characters';
$listOfCharacters = $connection->query($dbQuery);