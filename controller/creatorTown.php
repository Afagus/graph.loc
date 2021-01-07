<form action="/graph.loc/creatorTownSendDB" method="post">
    <table border="2">
        <tr>
            <th colspan="2">Введите локацию</th>
        </tr>
        <tr>
            <td>
                <input type="text" placeholder="Название города" name="townName"
            </td>
        </tr>
        <tr>
            <td>
                <select name="map">
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
                    for ($i = 0; $i < 1600; $i++) {
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
                    for ($i = 0; $i < 1200; $i++) {
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
                require_once 'controller/listOfCharacters.php';
                foreach ($listOfCharacters as $listOfCharacter) {
                    ?>
                    <input type="checkbox"
                           name="characters[]"
                           value="<?= $listOfCharacter['name'] ?>"><?= $listOfCharacter['name'] ?><Br>
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

