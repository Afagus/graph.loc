<?php
echo 'hello I`m character with ID = '. ROUTE[1];
require_once 'listOfItems.php';
require_once 'content/header.php';


$id = ROUTE[1];
$newCharacter = new \graph\classes\Character($id);
$newCharacter->createFormForCharacter();


