<?php

namespace graph\database;

const DB_HOST = 'localhost';
const DB_LOGIN = 'root';
const DB_PASSWORD = '';
const DB_NAME = 'graphbase';

class   singleConnectionToDB
{
    private $connection = null;
    private static $instance = null;


    private function __construct()
    {
        $this->connection = mysqli_connect
        (DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME)
        or die('Error of database');
        mysqli_set_charset($this->connection, "utf8");
    }


    static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function query($sql)
    {

        $res = mysqli_query($this->connection, $sql);

        if (!$res) {
            print_r($sql . '<br/><b>' . mysqli_error($this->connection) . '</b>');

        } else {
            return (is_object($res) ? (mysqli_fetch_all($res, MYSQLI_ASSOC)) : false);

        }
    }

    public function getLastId(){
        return mysqli_insert_id($this->connection);
    }
}