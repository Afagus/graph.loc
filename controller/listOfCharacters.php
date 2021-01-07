<?php

$connection = \database\singleConnectionToDB::getInstance();
$dbQuery = 'SELECT * FROM characters';
$listOfCharacters = $connection->query($dbQuery);