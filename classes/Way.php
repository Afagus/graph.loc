<?php


namespace graph\classes;


class Way
{
    public $townStart;
    public $townFinish;
    public $lengthOfWay;

    public function __construct($townStart, $townFinish){
        $this->townStart = $townStart;
        $this->townFinish = $townFinish;
        $this->lengthOfWay = $this->getLengthOfWay();
    }

    /**
     * @return mixed
     */
    public function getLengthOfWay()
    {
        $lengthOfWay = round(sqrt(pow(($this->townFinish->coordinate['x'] - $this->townStart->coordinate['x']), 2) +
                        pow(($this->townFinish->coordinate['y'] - $this->townStart->coordinate['y']), 2)));
        return $this->lengthOfWay = $lengthOfWay;
    }
}