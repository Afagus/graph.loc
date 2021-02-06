<?php
namespace graph\database;

require_once 'database/singleConnectionToDB.php';

class getListFromDB
{

    static public function getList($whatWeFind)
    {
        $connection = \graph\database\singleConnectionToDB::getInstance();
        $dbQuery = 'SELECT * FROM ' .$whatWeFind;
        return $connection->query($dbQuery);
    }

}