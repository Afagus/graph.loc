<?php
require_once 'loader.php';
require_once 'controller/listOfItems.php';

use graph\classes\Graph;


$graph = new Graph($listOfTowns);

foreach ($graph->listOfTowns as $town1) {
    $graph->addCity($town1['id']);
    }//Добавляем города
foreach ($graph->listOfTowns as $town1) {
    foreach ($graph->listOfTowns as $town2) {
        $graph->addWays($town1, $town2);
    }
}//Добавляем расстояния между городами


if (!empty($_POST['start'])) {

    $nearestCity = $_POST['start']; //обозначить стартовый город

        for ($i = 0; $i < count($graph->ways); $i++) {
        $graph->unSetPoint($nearestCity);
        $nearestCity = $graph->getNearestNeighbour($nearestCity);
    }
}
