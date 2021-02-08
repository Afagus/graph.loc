<?php
require_once 'content/header.php';
?>
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
                    require_once 'controller/listOfItems.php';
                    foreach ($listOfMaps as $listOfMap) { ?>
                        <option value="<?= $listOfMap['id'] ?>"><?= $listOfMap['name'] ?></option><br>
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
                <h5>Готов принять в гости</h5>
                <?php
                require_once 'controller/listOfItems.php';
                 foreach ($listOfCharacters as $listOfCharacter) {
                    ?>
                    <input type="checkbox"
                           name="characters[]"
                           value="<?= $listOfCharacter['id'] ?>"><?= $listOfCharacter['name'] ?><Br>
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

