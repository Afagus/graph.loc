<table style="width: 80%" border="2px">
    <tr align="center">
        <td>
            <form action="creatorSpace/" method="post">
                <input type="submit" name="create" value="Map Creator">
            </form>
        </td>
        <td>
            <form action="creatorGoods/" method="post">
                <input type="submit" name="createGoods" value="Goods Creator">
            </form>
        </td>
        <td>
            <form action="creatorShop" method="post">
                <input type="submit" name="redact" value="Shop Creator">
            </form>
        </td>
        <td>
            <form action="userAction" method="post">
                <input type="submit" name="userAction" value="Action">
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
            require_once 'controller/listOfGoods.php';
            foreach ($listOfGoods as $listOfGood) { ?>
                <a href=""><?=  $listOfGood['name']?></a><br>
            <?php } ?>
        </td>

    </tr>
</table>

