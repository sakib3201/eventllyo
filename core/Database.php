<?php

namespace Core;
use PDO;
use PDOException;

class Database {
    private static $conn;

    public static function connect() {
        if (!self::$conn) {
            $config = require 'config/config.php';

            try {
                self::$conn = new PDO(
                    "mysql:host={$config['db_host']};dbname={$config['db_name']}",
                    $config['db_user'],
                    $config['db_pass']
                );
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Database Connection Failed: " . $e->getMessage());
            }
        }
        return self::$conn;
    }
}
