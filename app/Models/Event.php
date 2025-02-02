<?php

namespace App\Models;

use Core\Database;
use PDO;

class Event {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function getAllEvents() {
        $stmt = $this->db->prepare("SELECT * FROM events");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getEventById($id) {
        $stmt = $this->db->prepare("SELECT * FROM events WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}


