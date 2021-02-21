<?php
require_once 'content/header.php';
?>
<form action="/graph.loc/creatorCharactersSendDB" method="post">
    <table border="2">
        <tr>
            <th colspan="2">Введите персонажа</th>
        </tr>
        <tr>
            <td>
                <input type="text" placeholder="Имя персонажа" name="NameOfCharacter"
            </td>
        </tr>
        <tr>
            <td>
                <?php
                require_once 'database/getListFromDB.php';
                $listOfTowns = \graph\database\getListFromDB::getList('town');
                foreach ($listOfTowns as $listOfTown):
                    ?>
                    <input type="checkbox"
                           name="friendshipTowns[]"
                           value="<?= $listOfTown['id'] ?>"><?= $listOfTown['name'] ?><Br>
                <?php endforeach;?>


            </td>
            <td>
                <input type="submit">
            </td>
        </tr>
    </table>
</form>
