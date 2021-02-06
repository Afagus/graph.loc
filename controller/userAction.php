<?php
require_once 'loader.php';
require_once 'listOfItems.php';
require_once 'logic.php';
require_once 'functions.php';

?>


<html>
<body>

<h1>Map</h1>
<h2>Set start point</h2>
<?php myDebugger($_POST); ?>
<form method="post">
    <p>
        <select name="startTown">
            <option disabled selected>Выберите стартовый город</option>
            <?php
            foreach ($listOfTowns as $town) { ?>
                <option value="<?= $town['id'] ?>"><?= $town['name'] ?></option><br>
            <?php } ?>
        </select>

    </p>
    <p>
        <select name="character">
            <option disabled selected>Выберите персонажа</option>
            <?php
            require_once 'controller/listOfItems.php';
            foreach ($listOfCharacters as $Character) { ?>
                <option value="<?= $Character['id'] ?>"><?= $Character['name'] ?></option><br>
            <?php } ?>
        </select>
        <input type="submit" name="startTown" value="Просчитать">
    </p>
</form>
<?php


// Перенаправление (обновление страницы)
if (isset($_POST['Submit'])) {
    echo "<meta http-equiv='refresh' content='0'>";
}


require_once 'controller/CreatorMap.php';
?>


</html>