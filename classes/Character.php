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

    public function createFormForCharacter()
    {
        ?>
        <form action="/graph.loc/characterChanger/<?=$this->id?>" method="post">
            <table border="2">
                <tr>
                    <th colspan="2">Персонаж</th>
                </tr>
                <tr>
                    <td>
                        <b>ID Персонажа</b>
                    </td>
                    <td>
                        <input type="text" placeholder="ID персонажа" name="IdOfCharacter" value="<?= $this->id ?>"
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>Имя Персонажа</b>
                    </td>
                    <td>
                        <input type="text" placeholder="Имя персонажа" name="NameOfCharacter" value="<?= $this->name ?>"
                    </td>

                    <td>
                        <input type="submit" value="Изменить">
                    </td>
                </tr>
            </table>
        </form>
        <form action="/graph.loc/characterDeleter/<?=$this->id?>" method="post">
            <table>
                <tr>
                    <td>
                        <input type="submit" value="Удалить персонажа напрочь ))">
                    </td>
                </tr>
            </table>

        </form>
        <?php
    }


}