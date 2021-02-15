<?php
require_once 'listOfItems.php';

$id = ROUTE[1];

$newTown = new \graph\classes\Town($id);
$newTown->createFormOfTown($listOfMaps, $listOfCharacters);
myDebugger($newTown->getListOfFriends());

