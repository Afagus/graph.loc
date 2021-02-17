<?php

require_once 'database/getListFromDB.php';

if (isset($_POST['character'])) {
    $listOfTowns = \graph\database\getListFromDB::getSortedTownList($_POST['character']);

} else {
    $listOfTowns = \graph\database\getListFromDB::getList('town');
}

$listOfMaps = \graph\database\getListFromDB::getList('map');
$listOfCharacters = \graph\database\getListFromDB::getList('characters');

