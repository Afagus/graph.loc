<?php
require_once 'classes/Graph.php';


$graph = new graph\classes\Graph($listOfTowns);


foreach ($graph->listOfTowns as $town1) {
    $graph->addCity($town1['id']);
    }//Добавляем города
foreach ($graph->listOfTowns as $town1) {
    foreach ($graph->listOfTowns as $town2) {
        $graph->addWays($town1, $town2);
    }
}//Добавляем расстояния между городами


$countOfCities = count($graph->ways);
$nearestCity = 5;
for ($i = 0; $i< $countOfCities; $i++){
    $graph->unSetPoint($nearestCity);
    $nearestCity = $graph->getNearestNeighbour($nearestCity);
}


myDebugger($graph->listOfTowns);
myDebugger($graph->visited);
