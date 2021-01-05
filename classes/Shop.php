<?php


namespace graph\classes;


class Shop
{
    public $goods = [];
    public $coordinates = [];
    public $nameOfShop = '';
    public $map = '';

    public function __construct($nameOfShop, $coordinates, $map)
    {
        $this->coordinates = $coordinates;
        $this->nameOfShop = $nameOfShop;
        $this->map = $map;
    }

    /**
     * @return array
     */
    public function getGoods()
    {
        return $this->goods;
    }

}