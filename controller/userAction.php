<?php
require_once 'logic.php';
require_once 'functions.php';
require_once 'content/header.php';
require_once 'listOfItems.php';

?>


<html>
<body>
<h1 align="center">Map</h1>

<form action="" method="post">
    <p>
        <select name="character">
            <option disabled selected>Выберите персонажа</option>
            <?php
            require_once 'controller/listOfItems.php';
            foreach ($listOfCharacters as $Character) { ?>
                <option <?= (key_exists('character',$_POST) && $_POST['character']== $Character['id'])?'selected="selected" ':''?> value="<?= $Character['id'] ?>"><?= $Character['name'] ?></option><br>
            <?php } ?>
        </select>

    </p>
<?php if(key_exists('character',$_POST) && $_POST['character']):?>
    <p>
        <select name="start">
            <option disabled selected>Выберите стартовый город</option>
            <?php
            foreach ($listOfTowns as $town) { ?>
                <option <?= (key_exists('start',$_POST) && $_POST['start'] == $town['id'])?'selected="selected"' :''?> value="<?= $town['id'] ?>"><?= $town['name'] ?></option><br>
            <?php } ?>
        </select>

    </p>
    <?php endif; ?>
    <input type="submit" name="choice" value="Выбрать">
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