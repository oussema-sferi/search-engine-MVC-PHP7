<?php


namespace Database;

use PDO;

class Db
{
    private static $dbInstance;
    public function __construct(){

    }
    public static function getInstance():PDO {
        if(is_null(static::$dbInstance)) {
            static::$dbInstance = new PDO("mysql:host=localhost;dbname=mini_project;", "root","");
        }
     return static::$dbInstance;
    }
}