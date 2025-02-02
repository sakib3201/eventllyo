<?php

namespace App\Models;

use Core\Model;

class Booking extends Model
{
    protected $table = 'bookings';

    public function create($event_data)
    {   
        $event_id = $event_data['event_id'];
        $user_id = $event_data['user_id'];

        $stmt = $this->db->prepare("INSERT INTO {$this->table} (user_id, event_id) VALUES (:user_id, :event_id)");
        return $stmt->execute(['user_id' => $user_id, 'event_id' => $event_id]);
    }

    public function getBookingsByUser($user_id)
    {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE user_id = :user_id");
        $stmt->execute(['user_id' => $user_id]);
        return $stmt->fetchAll();
    }

    public function getBookingsByEvent($event_id)
    {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE event_id = :event_id");
        $stmt->execute(['event_id' => $event_id]);
        return $stmt->fetchAll();
    }
}
