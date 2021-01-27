<table style="width: 80%" border="2px">
    <tr align="center">
        <td>
            <form action="creatorSpace/" method="post">
                <input type="submit" name="create" value="Map Creator">
            </form>
        </td>
        <td>
            <form action="creatorCharacters/" method="post">
                <input type="submit" name="nameOfCharacter" value="Персонажи">
            </form>
        </td>
        <td>
            <form action="creatorTown" method="post">
                <input type="submit" name="createTown" value="Места Средиземья">
            </form>
        </td>
        <td>
            <form action="userAction" method="post">
                <input type="submit" name="userAction" value="Action">
            </form>
        </td>
        <td>
            <form action="logic" method="post">
                <input type="submit" name="count" value="count">
            </form>
        </td>
    </tr>
    <tr>
        <td>
            <?php
            require_once 'controller/listOfMaps.php';
            foreach ($listOfMaps as $listOfMap) { ?>
                <a href=""><?=  $listOfMap['name'] . ' - pазмер ' .
                                $listOfMap['xSize'] . '*' .
                                $listOfMap['ySize'] ?></a><br>
            <?php } ?>
        </td>
        <td>
            <?php
            require_once 'controller/listOfCharacters.php';
            foreach ($listOfCharacters as $listOfCharacter) { ?>
                <a href=""><?=  $listOfCharacter['name']?></a><br>
            <?php } ?>
        </td>
        <td>
            <?php
            require_once 'controller/listOfTowns.php';
            foreach ($listOfTowns as $listOfTown) { ?>
                <a href=""><?=  $listOfTown['name']?></a><br>
            <?php } ?>
        </td>

    </tr>
</table>

