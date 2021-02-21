<?php
require_once 'content/header.php';
require_once 'database/getListFromDB.php';


foreach (\graph\database\getListFromDB::getList('characters') as $character):?>
    <a href="/graph.loc/userAction/<?= $character['id'] ?>"><?= $character['name'] ?></a><br>
<?php endforeach;

if (key_exists(1, ROUTE)):?>
    <form action="" method="post">
        <?php if (key_exists(1, ROUTE) && ROUTE[1]): ?>
            <p>
                <select name="start">
                    <option disabled selected>Выберите стартовый город</option>
                    <?php
                    $counterOfTowns = 0;
                    $listOfTowns = \graph\database\getListFromDB::getSortedTownList(ROUTE[1]);
                    foreach ($listOfTowns as $town) : ?>
                        <option <?= (key_exists('start', $_POST) && $_POST['start'] == $town['id']) ? 'selected="selected"' : '' ?>
                                value="<?= $town['id'] ?>"><?= $town['name'] ?></option><br>
                        <?php $counterOfTowns++;
                    endforeach; ?>
                </select>

            </p>
        <?php endif;
        if ($counterOfTowns < 2):
            echo '<b style="color: red">' . 'Внимание! Ваш песонаж может посетить ' . $counterOfTowns . ' город(а), расчет расстояние не возможен, добавьте городов больше' . '</b>';
            echo '<br>';
        endif; ?>
        <input type="submit" name="choice" value="Выбрать">
        </p>
    </form>
    <?php
    $graph1 = new \graph\classes\Graph($listOfTowns);

    /**
     *Добавляем города
     **/
    foreach ($graph1->listOfTowns as $town1) {
        $graph1->addCity($town1['id']);
    }

    /**
     * Добавляем расстояния между городами
     **/
    foreach ($graph1->listOfTowns as $town1) {
        foreach ($graph1->listOfTowns as $town2) {
            $graph1->addWays($town1, $town2);
        }
    }

    /**
     * обозначить стартовый город
     **/
    if (!empty($_POST['start'])) {

        $nearestCity = $_POST['start'];

        for ($i = 0; $i < count($graph1->ways); $i++) {
            $graph1->unSetPoint($nearestCity);
            $nearestCity = $graph1->getNearestNeighbour($nearestCity);
        }
    }

    /**
     * Строим карту
    **/
    $setMap = new \graph\classes\Map($graph1);
    $setMap->rendering();
endif;