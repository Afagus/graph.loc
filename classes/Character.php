<?php


namespace graph\classes;


class Character
{
    private $id;
    private $name;


    /**
     * @param array $setFromBD
     * Получить ID и имя города из базы данных
     * TODO проработать этот класс он не рабочий, продумать логику
     */
    public function __construct(array $setFromBD)
    {
        $this->id = $setFromBD['id'];
        $this->name = $setFromBD['name'];
    }

    public function changeNameOfCharacter($name)
    {
        $newConnection = \graph\database\singleConnectionToDB::getInstance();
        $sql = "UPDATE characters
                SET name = ". $name ."
                WHERE id= ". $this->id;
        echo $sql;
        $newQuery = $newConnection->query($sql);

    }

    public function deleteCharacter()
    {

    }
}