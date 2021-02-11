<?php


namespace graph\classes;


class Town
{
    private $id;
    private $name;
    private $coordinateX;
    private $coordinateY;
    private $friend;


    public function __construct($id)
    {
        $this->getTownByIdFromDB($id);
    }

    /**
     * @param $id
     * Получаем город по ID из базы данных
     */
    private function getTownByIdFromDB($id)
    {
        if (!$id) {
            echo 'Id is not allowed';
            exit;
        } else {
            $newConnection = \graph\database\singleConnectionToDB::getInstance();
            $sql = 'SELECT * FROM town
        WHERE id = ' . $id;
            $newQuery = $newConnection->query($sql);
            $newQuery = array_shift($newQuery);
            $this->id = $newQuery['id'];
            $this->name = $newQuery['name'];
            $this->coordinateX = $newQuery['coordinateX'];
            $this->coordinateY = $newQuery['coordinateY'];
        }
    }

    /**
     * @return $this
     * Геттер всего города целиком
     */
    public function getTown()
    {
        return $this;
    }

//    public function setFriend()
//    {
//        $newConnection = \graph\database\singleConnectionToDB::getInstance();
//        $sql = "INSERT INTO friendship
//(id_town, id_character)
//VALUES (" ")";
//        $newQuery = $newConnection->query($sql);
//
//    }

}