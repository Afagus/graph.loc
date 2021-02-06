<?php

require_once 'database/getListFromDB.php';

$listOfTowns = \graph\database\getListFromDB::getList('town');
$listOfMaps = \graph\database\getListFromDB::getList('map');
$listOfCharacters = \graph\database\getListFromDB::getList('characters');

