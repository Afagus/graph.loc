<?php
/**
 *
 * TODO продумать подгрузку страницы с персонажем
  **/
echo 'hello I`m character';
require_once 'listOfItems.php';
myDebugger($listOfCharacters);

$person = new \graph\classes\Character($listOfCharacters);
myDebugger($person);