<?php

class Database {

    private static $instance;
    public $db;


    public static function Instance()
    {
        if (self::$instance == null)
            self::$instance = new self();

        return self::$instance;
    }

    private function __construct()
    {
        // Языковая настройка.
        setlocale(LC_ALL, 'ru_RU.utf8');

        //данные для подключения
        $connectInfo = include "../config/db.php";
        $connectInfo = $connectInfo['db'];
        // Подключение к БД.
        $pdo = new PDO("mysql:host=".$connectInfo['host'].";dbname=".$connectInfo['dbname'], $connectInfo['username'], $connectInfo['password']);
        $this->db = new NotORM($pdo);
        $this->db->exec('SET NAMES utf8');
    }
}
