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
                    FROM town                    
                    LEFT JOIN friendship 
                    ON town.id = id_town
                    where id_character in ($id_character)";

        return $connection->query($dbQuery);
    }

}