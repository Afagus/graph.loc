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
    <circle cx="<?= $listOfTown['coordinateX']+30?>" cy="<?= $listOfTown['coordinateY']+30?>" r="5" stroke="green" stroke-width="2" fill="red" />
    <text style="font-weight: bold" x="<?= $listOfTown['coordinateX']+40?>" y="<?= $listOfTown['coordinateY']+ 30?>" fill="white"><?= $listOfTown['name']?></text>
    <?php endforeach;?>

</svg>

</body>
</html>