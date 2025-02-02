<?php

use Core\Migration;

class CreateUsersTable implements Migration {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function up() {
        $query = "CREATE TABLE IF NOT EXISTS users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(100) NOT NULL,
            email VARCHAR(100) UNIQUE NOT NULL,
            role ENUM('admin','user') DEFAULT 'user',
            password VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";

        $this->db->exec($query);
    }

    public function down() {
        $query = "DROP TABLE IF EXISTS users";
        $this->db->exec($query);
    }
}
