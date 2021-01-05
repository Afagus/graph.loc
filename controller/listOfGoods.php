<?php

$connection = \database\singleConnectionToDB::getInstance();
$dbQuery = 'SELECT * FROM goods';
$listOfGoods = $connection->query($dbQuery);