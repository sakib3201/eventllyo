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
        
        $events = [
            [
                'name' => 'PHP Conference',
                'description' => 'Join us for a day of talks and networking',
                'date' => '2023-03-01 00:00:00',
                'price' => 20.00,
                'location' => 'The Brewery, London',
                'start_time' => '09:00:00',
                'end_time' => '17:00:00'
            ],
            [
                'name' => 'JavaScript Workshop',
                'description' => 'Improve your JavaScript skills with our expert instructors',
                'date' => '2023-03-15 00:00:00',
                'price' => 15.00,
                'location' => 'The Brewery, London',
                'start_time' => '10:00:00',
                'end_time' => '16:00:00'
            ],
            [
                'name' => 'HTML/CSS Course',
                'description' => 'Learn the basics of HTML and CSS',
                'date' => '2023-03-22 00:00:00',
                'price' => 10.00,
                'location' => 'The Brewery, London',
                'start_time' => '09:00:00',
                'end_time' => '13:00:00'
            ]
        ];

        foreach ($events as $event) {
            $query = "INSERT INTO events (name, description, date, price, location, start_time, end_time) VALUES (:name, :description, :date, :price, :location, :start_time, :end_time)";
            $stmt = $this->db->prepare($query);
            $stmt->execute([
                ':name' => $event['name'],
                ':description' => $event['description'],
                ':date' => $event['date'],
                ':price' => $event['price'],
                ':location' => $event['location'],
                ':start_time' => $event['start_time'],
                ':end_time' => $event['end_time']
            ]);
        }
    }

    public function down() {
        $query = "DROP TABLE IF EXISTS events";
        $this->db->exec($query);
    }
}
