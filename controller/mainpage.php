<table style="width: 80%" border="2px">
    <tr align="center">
        <td>
            <form action="creatorSpace/" method="post">
                <input type="submit" name="create" value="Map Creator">
            </form>
        </td>
        <td>
            <form action="creatorCharacters/" method="post">
                <input type="submit" name="nameOfCharacter" value="Создать персонажа">
            </form>
        </td>
        <td>
            <form action="creatorTown" method="post">
                <input type="submit" name="createTown" value="Создать город Средиземья">
            </form>
        </td>
        <td>
            <form action="userAction" method="post">
                <input type="submit" name="userAction" value="Карта">
            </form>
        </td>
        <td>
            <form action="logic" method="post">
                <input type="submit" name="count" value="count">
            </form>
        </td>
    </tr>
    <td align="center"><h4>Список имеющихся карт</h4></td>
    <td align="center"><h4>Список имеющихся персонажей</h4></td>
    <td align="center"><h4>Список имеющихся городов</h4></td>

    <tr>
        <td>

            <?php
            require_once 'controller/listOfItems.php';
            foreach ($listOfMaps as $listOfMap) { ?>
                <a href=""><?= $listOfMap['name'] . ' - pазмер ' .
                    $listOfMap['xSize'] . '*' .
                    $listOfMap['ySize'] ?></a><br>
            <?php } ?>
        </td>
        <td>
            <?php
            foreach ($listOfCharacters as $listOfCharacter) { ?>
                <a href="character/<?=$listOfCharacter['id']?>/action"><?= $listOfCharacter['name'] ?></a><br>
            <?php } ?>
        </td>
        <td>
            <?php
            foreach ($listOfTowns as $listOfTown) { ?>
                <a href="town/<?= $listOfTown['id']?>/action"><?= $listOfTown['name'] ?></a><br>
            <?php } ?>
        </td>

    </tr>
</table>

