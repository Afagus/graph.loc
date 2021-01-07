<?php

$connection = \database\singleConnectionToDB::getInstance();
$dbQuery = 'SELECT * FROM town';
$listOfTowns = $connection->query($dbQuery);