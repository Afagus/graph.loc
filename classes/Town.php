<?php

namespace graph\classes;


class Town
{
    public $name = '';
    public $townId;
    public $coordinate = [];


    public function __construct($town)
    {
        $this->townId = $town['id'];
        $this->coordinate['x'] = $town['coordinateX'];
        $this->coordinate['y'] = $town['coordinateY'];
        $this->name = $town['name'];
    }

    /**
     * @param array $waitingHero
     */
    public function setWaitingHero(array $waitingHero): void
    {
        $this->waitingHero = $waitingHero;
    }

    public function setNameFromDB()
    {


    }
}