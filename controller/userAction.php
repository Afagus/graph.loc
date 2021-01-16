<?php
require_once 'controller/listOfCharacters.php';
require_once 'controller/loader.php';
require_once 'controller/listOfTowns.php';

?>


<html>
<body>

<h1>Map</h1>

<svg width="1600" height="1200" style="background-image: url(content/pic/middleearth.jpg)">
    <text style="font-weight: bold" x="630" y="30" font-style="oblique">Map of BEST WORLD</text>

    <?php

    foreach ($listOfTowns as $listOfTown):?>
        <circle cx="<?= $listOfTown['coordinateX']?>" cy="<?= $listOfTown['coordinateY']?>" r="5"
                stroke="green" stroke-width="2" fill="red"/>
        <text style="font-weight: bold" x="<?= $listOfTown['coordinateX']?>"
              y="<?= $listOfTown['coordinateY']?>" fill="white"><?= $listOfTown['name'] ?></text>
    <?php endforeach; ?>
    <?php

    foreach ($listOfTowns as $townStart) {
        foreach ($listOfTowns as $townFinish) {
            if ($townFinish['id'] == $townStart['id']) {
                break;
            } ?>
            <line x1="<?= $townStart['coordinateX'] ?>" y1="<?= $townStart['coordinateY'] ?>"
                  x2="<?= $townFinish['coordinateX'] ?>" y2="<?= $townFinish['coordinateY'] ?>"
                  style="stroke:yellow;stroke-width:2"/>
        <?php }
    }
    ?>
</svg>

</body>
</html>