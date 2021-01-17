<?php


namespace graph\classes;


class Way
{
    public $townStart;
    public $townFinish;
    static $lengthOfWay;

    public function __construct($townStart, $townFinish){
        $this->townStart = $townStart;
        $this->townFinish = $townFinish;
        
    }

    /**
     * @return mixed
     */
    static public function getLengthOfWay($townStart, $townFinish)
    {
        $lengthOfWay = round(sqrt(pow(($townFinish->coordinate['x'] - $townStart->coordinate['x']), 2) +
                        pow(($townFinish->coordinate['y'] - $townStart->coordinate['y']), 2)));
        return self::$lengthOfWay = $lengthOfWay;
    }
}