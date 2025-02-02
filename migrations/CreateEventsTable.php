<?php

use Core\Migration;
class CreateEventsTable implements Migration {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function up() {
        $query = "CREATE TABLE IF NOT EXISTS events (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            description TEXT,
            date DATETIME NOT NULL,
            price DECIMAL(10,2) NOT NULL,
            location VARCHAR(255) NOT NULL,
            start_time TIME NOT NULL,
            end_time TIME NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";

        $this->db->exec($query);
    }

    public function down() {
        $query = "DROP TABLE IF EXISTS events";
        $this->db->exec($query);
    }
}
