<?php

$connection = \database\singleConnectionToDB::getInstance();
$dbQuery = 'SELECT * FROM map';
$listOfMaps = $connection->query($dbQuery);


