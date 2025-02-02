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
        
        $users = [
            ['name' => 'Admin User', 'email' => 'admin@gmail.com', 'role' => 'admin', 'password' => password_hash('123456', PASSWORD_BCRYPT)],
            ['name' => 'Normal User', 'email' => 'user@gmail.com', 'role' => 'user', 'password' => password_hash('123456', PASSWORD_BCRYPT)],
        ];

        foreach ($users as $user) {
            $stmt = $this->db->prepare("INSERT INTO users (name, email, role, password) VALUES (:name, :email, :role, :password)");
            $stmt->execute([
                ':name' => $user['name'],
                ':email' => $user['email'],
                ':role' => $user['role'],
                ':password' => $user['password'],
            ]);
        }
    }

    public function down() {
        $query = "DROP TABLE IF EXISTS users";
        $this->db->exec($query);
    }
}
