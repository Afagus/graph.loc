<?php


namespace graph\classes;


use graph\database\singleConnectionToDB;

class Character
{
    private $id;
    private $name;



    public function __construct($id)
    {
        $this->getCharacterByIdFromDB($id);
    }

    public function changeNameOfCharacter($name)
    {
        $newConnection = \graph\database\singleConnectionToDB::getInstance();
        $sql = "UPDATE characters
                SET name = " . '\'' . $name . '\'' .
            "WHERE id = " . $this->id;
        $newQuery = $newConnection->query($sql);
    }

    public function deleteCharacter()
    {
        if (!$this->id) {
            echo 'Id is not allowed';
            exit();
        } else {
            $newConnection = \graph\database\singleConnectionToDB::getInstance();
            $sql = "DELETE FROM characters
             WHERE id = " . $this->id;
            $newQuery = $newConnection->query($sql);
        }
    }

    public function getIdCharacter()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    private function getCharacterByIdFromDB($id)
    {
        if (!$id) {
            echo 'Id is not allowed';
            exit;
        } else {
            $newConnection = \graph\database\singleConnectionToDB::getInstance();
            $sql = 'SELECT name FROM characters
        WHERE id = ' . $id;
            $newQuery = $newConnection->query($sql);
            $this->id = $id;
            $this->name = ($newQuery[0]['name']);
        }
    }
}