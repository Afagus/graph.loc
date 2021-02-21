<?php


namespace graph\classes;


use graph\database\getListFromDB;
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

    public function getListOfTownFriends()
    {
        $result = [];
        $newConnection = \graph\database\singleConnectionToDB::getInstance();
        $sql = "SELECT * 
                FROM  friendship
                WHERE id_character= $this->id";
        $newQuery = $newConnection->query($sql);
        if ($newQuery) {
            foreach ($newQuery as $el) {
                $result[] = $el['id_town'];
            }
        }
        return $result;
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
        <form action="/graph.loc/characterChanger/<?= $this->id ?>" method="post">
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
                <tr>
                    <td>
                        <b>Города для посещения</b>
                    </td>
                    <td>

                        <?php
                        $listOfTowns = getListFromDB::getList('town');
                        $arrayOfFriend = $this->getListOfTownFriends();
                        foreach ($listOfTowns as $town):

                            if (in_array($town['id'], $arrayOfFriend)):?>
                                <strong><a href="/graph.loc/friendDeleter/<?=$this->id?>/<?=$town['id']?>">Друг <?= $town['name'] ?> </a></strong><br>
                            <?php else:?>
                                <input type="checkbox"
                                       name="towns[]"
                                       value="<?= $town['id'] ?>"><?= $town['name'] ?><br>
                            <?php endif;

                        endforeach

                        ?>
                    </td>
                </tr>

                <td>
                    <input type="submit" value="Изменить">
                </td>
                </tr>
            </table>
        </form>
        <form action="/graph.loc/characterDeleter/<?= $this->id ?>" method="post">
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