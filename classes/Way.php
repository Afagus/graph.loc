<?php


namespace graph\classes;
require_once 'controller/loader.php';

class Way
{
    public static $townStart;
    public static $townFinish;



    /**
     * @param $townStart
     * @param $townFinish
     * @return mixed
     * Вычисляем расстояние между городами по кординатам точек
     */
    static public function getLengthOfWay($townStart, $townFinish)
    {
        return round(sqrt(pow(($townFinish['coordinateX'] -
                $townStart['coordinateX']), 2) +
            pow(($townFinish['coordinateY'] -
                $townStart['coordinateY']), 2)));
    }
}