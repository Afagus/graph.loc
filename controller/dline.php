<?php
require_once 'controller/listOfTowns.php';
//mydebugger($listOfTowns);

$x1 = 10;
$x2 = 20;

$y1 = 50;
$y2 = 70;


function countOfLength($x1, $x2, $y1, $y2)
{
    return round(sqrt(pow(($x2 - $x1), 2) + pow(($y2 - $y1), 2)));

}

$way = '';

foreach ($listOfTowns as $coordinates) {
    foreach ($listOfTowns as $town) {
//        if ($coordinates['id'] == $town['id']) {
//            break;
//        }
            $way .= countOfLength($coordinates['coordinateX'], $town['coordinateX'], $coordinates['coordinateY'], $town['coordinateY']);
            $way .= ' miles between:' . $town['name'] . '-' . $coordinates['name'] . '<br>';

        }

}
countOfLength($x1, $x2, $y1, $y2);
echo $way;