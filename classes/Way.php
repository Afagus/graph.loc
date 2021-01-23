<?php


namespace graph\classes;


class Way
{
    public $townStart;
    public $townFinish;
    static $lengthOfWay;
    public static $visited = [];

    public function __construct($townStart, $townFinish)
    {
        $this->townStart = $townStart;
        $this->townFinish = $townFinish;

    }

    /**
     * @return mixed
     */
    static public function getLengthOfWay($townStart, $townFinish)
    {
        return round(sqrt(pow(($townFinish['coordinateX'] -
                $townStart['coordinateX']), 2) +
            pow(($townFinish['coordinateY'] -
                $townStart['coordinateY']), 2)));
    }



}