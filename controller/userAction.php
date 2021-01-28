<?php
require_once 'listOfCharacters.php';
require_once 'loader.php';
require_once 'listOfTowns.php';
require_once 'logic.php';

?>


<html>
<body>

<h1>Map</h1>

<svg width="1600" height="1200" style="background-image: url(content/pic/middleearth.jpg)">
    <text style="font-weight: bold" x="630" y="30" font-style="oblique">Map of BEST WORLD</text>

    <?php

    /** @var $graph */

    foreach ($graph->listOfTowns as $listOfTown):?>
        <circle cx="<?= $listOfTown['coordinateX'] ?>" cy="<?= $listOfTown['coordinateY'] ?>" r="5"
                stroke="green" stroke-width="2" fill="red"/>
        <text style="font-weight: bold" x="<?= $listOfTown['coordinateX'] ?>"
              y="<?= $listOfTown['coordinateY'] ?>" fill="white"><?= $listOfTown['name'] ?></text>
    <?php endforeach; ?>
    <?php


    for ($i = 0; $i < count($graph->visited)-1; $i++) {
        ?>
        <line x1="<?= $graph->visited[$i]['x'] ?>" y1="<?= $graph->visited[$i]['y'] ?>"
              x2="<?= $graph->visited[$i + 1]['x'] ?>" y2="<?= $graph->visited[$i + 1]['y'] ?>"
              style="stroke:yellow;stroke-width:2"/>
        <?php

    }

    ?>
</svg>

</body>
</html>