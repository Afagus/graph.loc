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

    public function deleteTown()
    {
        if (!$this->id) {
            echo 'Id is not allowed';
            exit();
        } else {
            $newConnection = \graph\database\singleConnectionToDB::getInstance();
            $sql = "DELETE FROM town
             WHERE id = " . $this->id;
            $newQuery = $newConnection->query($sql);
        }
    }

    public function changeTown($name)
    {
        $newConnection = \graph\database\singleConnectionToDB::getInstance();
        $sql = "UPDATE town
                SET name = " . '\'' . $name . '\'' .
            "WHERE id = " . $this->id;
        $newQuery = $newConnection->query($sql);

    }

    /**
     * @return $this
     * Геттер всего города целиком
     */
    public function getTown()
    {
        return $this;
    }

    public function getListOfFriends()
    {
        $result = [];
        $newConnection = \graph\database\singleConnectionToDB::getInstance();
        $sql = "SELECT id_character 
        FROM friendship
        WHERE  id_town = ". $this->id;
        $temp = $newConnection->query($sql);
        if($temp){
            foreach ($temp as $el){
                $result[]=$el['id_character'];
            }
        }
        return $result;
    }


    public function createFormOfTown($listOfMaps, $listOfCharacters)
    {
        ?>
        <form action="/graph.loc/townChanger/<?= $this->id?>" method="post">
            <table border="2">
                <tr>
                    <th colspan="2">Изменить город</th>
                </tr>
                <tr>
                    <td>
                        <input type="text" placeholder="Название города" name="townName" value="<?= $this->name?>"
                    </td>
                </tr>
                <tr>
                    <td>
                        <select name="map">
                            <?php if ($this->map):
                            ?>
                            <option disabled selected><?= $this->map?></option>
                            <?php endif;
                            foreach ($listOfMaps as $listOfMap) :?>
                                <option value="<?= $listOfMap['id'] ?>"><?= $listOfMap['name'] ?></option><br>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <select name="coordinateX">
                            <option selected><?= $this->coordinateX?></option>
                            <?php
                            for ($i = 0; $i < 1600; $i++) :
                                ?>
                                <option><?=$i ?></option>
                            <?php endfor;
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <select name="coordinateY">
                            <option selected value="<?= $this->coordinateY?>"><?= $this->coordinateY?></option>
                            <?php
                            for ($i = 0; $i < 1200; $i++) {
                                ?>
                                <option value="<?=$i ?>"><?= $i ?></option>
                            <?php }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h5>Установить друга</h5>
                        <?php
                        $arrayOfFriend = $this->getListOfFriends();
                        foreach ($listOfCharacters as $listOfCharacter) {
                            if(in_array($listOfCharacter['id'],$arrayOfFriend)):
                            ?>
                                <strong><a href="/graph.loc/friendDeleter/<?= $listOfCharacter['id']?>/<?=$this->id?>">Друг <?= $listOfCharacter['name'] ?> </a></strong><br>

                            <?php else:?>
                                <input type="checkbox"
                                   name="characters[]"
                                   value="<?= $listOfCharacter['id'] ?>"><?= $listOfCharacter['name'] ?><br>
                            <?php endif;?>
                        <?php } ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="Изменить город">
                    </td>
                </tr>
            </table>
        </form>
        <?php
    }
}