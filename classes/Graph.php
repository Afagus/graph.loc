<?php

namespace graph\classes;
require_once '../controller/loader.php';
require_once '../controller/listOfTowns.php';
require_once '../classes/Way.php';

class Graph
{
    public $ways;
    public $visited;

    public function __construct()
    {
        $this->ways = [];

    }

    public function addCity($city)
    {
        $this->ways[$city] = [];
    }

    public function addWays($city1, $city2)
    {
        if ($city1['id'] !== $city2['id']) {
            $this->ways[$city1['id']][$city2['id']] = Way::getLengthOfWay($city1, $city2);
            $this->ways[$city2['id']][$city1['id']] = Way::getLengthOfWay($city1, $city2);
        }
    }

    public function getNearestNeighbour($fromMe)
    {
        $this->visited[] = $fromMe;
        asort($this->ways[$fromMe]);

        return array_key_first($this->ways[$fromMe]);
    }

    public function setVisited($visited)
    {
        $this->visited[] = $visited;
        return $visited;
    }

    public function unSetPoint($toDelete)
    {
        mydebugger($toDelete);
        foreach ($this->ways as $key1 => $way) {
            foreach ($way as $key2 => $value) {

                mydebugger($this->ways);

            }


        }
    }

}

$graph = new Graph();

foreach ($listOfTowns as $town1) {
    $graph->addCity($town1['id']);
}//Добавляем города
foreach ($listOfTowns as $town1) {
    foreach ($listOfTowns as $town2) {
        $graph->addWays($town1, $town2);
    }
}//Добавляем расстояния между городами
//mydebugger($graph);
$nearestCity = $graph->getNearestNeighbour('32');
$toDelete = $graph->setVisited($nearestCity);
$graph->unSetPoint($toDelete);


//mydebugger($graph);

