<?php

use Core\Migration;

class CreateBookingsTable implements Migration {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function up() {
        $query = "CREATE TABLE IF NOT EXISTS bookings (
            id INT AUTO_INCREMENT PRIMARY KEY,
            user_id INT NOT NULL,
            event_id INT NOT NULL,
            status ENUM('pending', 'confirmed', 'cancelled') DEFAULT 'pending',
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";

        $this->db->exec($query);
    }

    public function down() {
        $query = "DROP TABLE IF EXISTS bookings";
        $this->db->exec($query);
    }
}
