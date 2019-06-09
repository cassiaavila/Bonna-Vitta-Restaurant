<?php

    define('DB_HOST', 'localhost');
    define('DB_PORT', 3306);
    define('DB_NAME', 'bonna_vitta_db');
    define('DB_USER', 'root');
    define('DB_PWD', '123456');

class Database
{

    private static $pdo = null;

    private function __construct()
    {

    }

    public static function getConnection()
    {
        if (self::$pdo == null) {
            try {
                self::$pdo = new PDO("mysql:host=" . DB_HOST . ":" . DB_PORT . ";dbname=" . DB_NAME, DB_USER, DB_PWD);
            } catch (PDOException $e) {
                die('Erro ao conectar com o MySQL: ' . $e->getMessage());
            }
            self::$pdo->exec('set names utf8');
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        return self::$pdo;
    }

}
