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


    static public function getSortedTownList($id_character)
    {
        $connection = \graph\database\singleConnectionToDB::getInstance();
        $dbQuery = "SELECT * 
                    FROM friendship                    
                    JOIN town 
                    ON id_character = ". $id_character;

        return $connection->query($dbQuery);
    }

}