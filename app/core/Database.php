<?php

class Database
{
    private static $pdo;
    private static $dsn = 'mysql:dbname=weblaboratory;host=127.0.0.1;charset=utf8';
    private static $username = 'root';
    private static $password = '';

    public static function getInstance()
    {
        if (is_null(static::$pdo)) {
            static::$pdo = new PDO(
                static::$dsn,
                static::$username,
                static::$password,
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            );
        }
        return static::$pdo;
    }
}