<?php

namespace Core;
use PDO;
use PDOException;

class Database {
    private static $conn;
    private static $instance = null;
    private $connection;

    public static function connect() {
        if (!self::$conn) {
            $config = [
                'db_host' => getenv('DB_HOST') ?: 'localhost',
                'db_name' => getenv('DB_NAME') ?: 'eventllyo_db',
                'db_user' => getenv('DB_USER') ?: 'root',
                'db_pass' => getenv('DB_PASS') ?: ''
            ];

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

     /**
     * Get the singleton instance of Database
     */
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Get the PDO connection
     */
    public function getConnection() {
        return $this->connection;
    }
}
