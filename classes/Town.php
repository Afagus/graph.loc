<?php

namespace graph\classes;


class Town
{
    public $name = '';
    public $townId;
    public $coordinate = [];
    public $visited = 0;
    public $neighbours = [];


    public function __construct($town = [])
    {
        $this->townId = $town['id'];
        $this->coordinate['x'] = $town['coordinateX'];
        $this->coordinate['y'] = $town['coordinateY'];
        $this->name = $town['name'];
    }


//    public function getNearestNeighbour($listNeighbours)
//    {
//        //mydebugger($listNeighbours);
//    }


}