<form action="/graph/creatorShopSendDB" method="post">
    <table border="2">
        <tr>
            <th colspan="2">Введите данные магазина</th>
        </tr>
        <tr>
            <td>
                <input type="text" placeholder="Название магазина" name="shopName"
            </td>
        </tr>
        <tr>
            <td>
                <select name="toMap">
                    <option disabled selected>Принадлежность к карте</option>
                    <?php
                    require_once 'controller/listOfMaps.php';
                    foreach ($listOfMaps as $listOfMap) { ?>
                        <option value="<?= $listOfMap['name'] ?>"><?= $listOfMap['name'] ?></option><br>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <select name="coordinateX">
                    <option disabled selected>Координата х</option>
                    <?php
                    for ($i = 0; $i < 100; $i++) {
                        ?>
                        <option><?= $i ?></option>
                    <?php }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <select name="coordinateY">
                    <option disabled selected>Координата y</option>
                    <?php
                    for ($i = 0; $i < 100; $i++) {
                        ?>
                        <option><?= $i ?></option>
                    <?php }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <?php
                require_once 'controller/listOfGoods.php';
                foreach ($listOfGoods as $listOfGood) {
                    ?>
                    <input type="checkbox"
                           name="goods[]"
                           value="<?= $listOfGood['name'] ?>"><?= $listOfGood['name'] ?><Br>
                <?php } ?>
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit">
            </td>
        </tr>
    </table>
</form>

