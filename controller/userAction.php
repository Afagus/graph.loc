<?php
require_once 'logic.php';
require_once 'functions.php';
require_once 'content/header.php';
require_once 'listOfItems.php';

?>


<html>
<body>
<h1 align="center">Map</h1>

<form method="post">
    <p>
        <select name="start">
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


$setMap = new \graph\classes\Map($graph);
$setMap->rendering();


?>
</body>
</html>