<?php

namespace graph\classes;
require_once 'controller/loader.php';

class Town
{
    public $name = '';
    public $townId;
    public $coordinate;
    public $neighbours;


    public function __construct($town = [])
    {
        $this->townId = $town['id'];
        $this->coordinate['x'] = $town['coordinateX'];
        $this->coordinate['y'] = $town['coordinateY'];
        $this->name = $town['name'];
    }
}