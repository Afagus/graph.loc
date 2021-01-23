<?php
require_once '../database/singleConnectionToDB.php';

$connection = \database\singleConnectionToDB::getInstance();
$dbQuery = 'SELECT * FROM town';
$listOfTowns = $connection->query($dbQuery);