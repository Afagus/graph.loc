<?php
require_once 'controller/listOfTowns.php';

//mydebugger($listOfTowns);

$x1 = 0;
$x2 = 0;

$y1 = 0;
$y2 = 0;


function countOfLength($x1, $x2, $y1, $y2)
{
    return round(sqrt(pow(($x2 - $x1), 2) + pow(($y2 - $y1), 2)));

}

$way = '';
foreach ($listOfTowns as $startTown) {
    foreach ($listOfTowns as $finishTown) {
        $way = countOfLength($finishTown['coordinateX'], $startTown['coordinateX'], $finishTown['coordinateY'], $startTown['coordinateY']);
        if (!$way == 0) {
            $wayBetween[$startTown['name']][$finishTown['name']] = $way;
        }
    }
}
countOfLength($x1, $x2, $y1, $y2);


//mydebugger($wayBetween);

foreach ($wayBetween as $key => $endCity) {
    asort($endCity);

    $firstKey[$key] = array_key_first($endCity);
}
//mydebugger($firstKey);

