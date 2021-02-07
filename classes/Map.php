<?php


namespace graph\classes;
require_once 'controller/listOfItems.php';

use graph\database\getListFromDB;
use graph\database\singleConnectionToDB;

class Map
{
private $listOfTowns;
private $visited;

public function __construct(\graph\classes\Graph $graph)
{
    $this->listOfTowns = $graph->listOfTowns;
    $this->visited = $graph->visited;
}


public function setTown()
{
    foreach ($this->listOfTowns as $listOfTown):?>
        <circle cx="<?= $listOfTown['coordinateX'] ?>" cy="<?= $listOfTown['coordinateY'] ?>" r="5"
                stroke="green" stroke-width="2" fill="red"></circle>
        <text style="font-weight: bold" x="<?= $listOfTown['coordinateX'] ?>"
              y="<?= $listOfTown['coordinateY'] ?>" fill="white"><?= $listOfTown['name'] ?></text>
    <?php endforeach;
}

public function getHeadOfMap()
{
?>
<svg width="1600" height="1200" style="background-image: url(content/pic/middleearth.jpg)">
    <text style="font-weight: bold" x="630" y="30" font-style="oblique">Map of BEST WORLD</text>
    <?php

    }

    public function getbuildingWay()
    {
        for ($i = 0; $i < count($this->visited) - 1; $i++) {
            ?>
            <line x1="<?= $this->visited[$i]['x'] ?>" y1="<?= $this->visited[$i]['y'] ?>"
                  x2="<?= $this->visited[$i + 1]['x'] ?>" y2="<?= $this->visited[$i + 1]['y'] ?>"
                  style="stroke:yellow;stroke-width:2"/>
            <?php
        }

    }

    public function rendering()
    {
    ?>
    <svg width="1600" height="1200" style="background-image: url(content/pic/middleearth.jpg)">
        <text style="font-weight: bold" x="630" y="30" font-style="oblique">Map of BEST WORLD</text>
        <?php
        $this->setTown();
        $this->getbuildingWay();
        ?>
    </svg>
    <?php
    }

    }
