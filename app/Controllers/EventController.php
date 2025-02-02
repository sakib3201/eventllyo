<?php

use App\Models\Event;
use Core\Controller;

class EventController extends Controller {
    public function index() {
        $events = (new Event())->getAllEvents();
        $this->view('events', ['events' => $events]);
    }

    public function details($id) {
        $eventModel = $this->model('Event');
        $event = $eventModel->getEventById($id);
        $this->view('event_details', ['event' => $event]);
    }
}
