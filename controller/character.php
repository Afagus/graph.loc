<?php
echo 'hello I`m character with ID = '. ROUTE[1];
require_once 'listOfItems.php';
require_once 'content/header.php';
require_once 'logic.php';

$id = ROUTE[1];
$newCharacter = new \graph\classes\Character($id);

$newTown = new \graph\classes\Town($id);
myDebugger($newTown->getTown());


//$newCharacter->deleteCharacter();


