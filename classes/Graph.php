<?php

namespace graph\classes;
require_once '../controller/loader.php';
require_once '../controller/listOfTowns.php';
require_once '../classes/Way.php';

class Graph
{
    public $ways;
    public $visited = [];

    public function __construct()
    {
        $this->ways = [];

    }

    /**
     * @param $city
     * Добавляем название города
     */
    public function addCity($city)
    {
        $this->ways[$city] = [];
    }

    /**
     * @param $city1
     * @param $city2
     * Формируем массив с точками городов и расстояниями между ними
     */
    public function addWays($city1, $city2)
    {
        if ($city1['id'] !== $city2['id']) {
            $this->ways[$city1['id']][$city2['id']] = Way::getLengthOfWay($city1, $city2);
            $this->ways[$city2['id']][$city1['id']] = Way::getLengthOfWay($city1, $city2);
        }
    }

    /**
     * @param $fromMe
     * @return int|string|null
     * Получаем ближайший город-сосед, к указанному городу
     */
    public function getNearestNeighbour($fromMe)
    {
        if (!isset($this->visited[0])) {
            $this->visited[] = $fromMe;
        }
        asort($this->ways[$fromMe]);
        return array_key_first($this->ways[$fromMe]);
    }

    /**
     * @param $visited
     * @return mixed
     * Отмечаем посещенные города
     */
    public function setVisited($visited)
    {
        $this->visited[] = $visited;
        return $visited;
    }

    /**
     * @param $toDelete
     * Удаляем посещенный город из массива возможных городов
     */
    public function unSetPoint($toDelete)
    {
        $this->setVisited($toDelete);
        foreach ($this->ways as &$way) {
            if (key_exists($toDelete, $way)) {
                unset($way[$toDelete]);
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

$countOfCities = count($graph->ways);
$nearestCity = 5;
for ($i = 0; $i< $countOfCities; $i++){
    $graph->unSetPoint($nearestCity);
    $nearestCity = $graph->getNearestNeighbour($nearestCity);
}



mydebugger($nearestCity);
mydebugger($graph);
