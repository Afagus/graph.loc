<?php

namespace graph\classes;


class Graph
{
    public $ways;
    public $visited = [];
    public $listOfTowns;

    public function __construct($listOfTowns)
    {
        $this->ways = [];
        $this->listOfTowns = $listOfTowns;

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
     * Получаем расстояние между городами по координатам точек
     **/
    public function getLengthOfWay($townStart, $townFinish)
    {
        return round(sqrt(pow(($townFinish['coordinateX'] -
                $townStart['coordinateX']), 2) +
            pow(($townFinish['coordinateY'] -
                $townStart['coordinateY']), 2)));
    }

    /**
     * @param $city1
     * @param $city2
     * Формируем массив с точками городов и расстояниями между ними
     */


    public function addWays($city1, $city2)
    {
        if ($city1['id'] !== $city2['id']) {
            $this->ways[$city1['id']][$city2['id']] = $this->getLengthOfWay($city1, $city2);
            $this->ways[$city2['id']][$city1['id']] = $this->getLengthOfWay($city1, $city2);
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
            $this->setVisited($fromMe);
        }
        asort($this->ways[$fromMe]);
        return array_key_first($this->ways[$fromMe]);
    }

    public function getCoordinatesById($id)
    {
        return 1;


    }

    /**
     * @param $visited
     * @return mixed
     * Отмечаем посещенные города
     */
    public function setVisited($visited)
    {
        $this->visited[$visited] = $this->getCoordinatesById($visited);
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

