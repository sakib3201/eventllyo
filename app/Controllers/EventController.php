<?php
namespace App\Controllers;

use App\Models\Event;
use Core\Controller;

class EventController extends Controller {
    public function index() {
        $events = (new Event())->getAllEvents();
        $this->view('events', ['events' => $events]);
    }

    public function details($id) {
        $eventModel = new Event();
        $event = $eventModel->getEventById($id);
        $this->view('event_details', ['event' => $event]);
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
            $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
            $date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING);
            $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $location = filter_input(INPUT_POST, 'location', FILTER_SANITIZE_STRING);
            $start_time = filter_input(INPUT_POST, 'start_time', FILTER_SANITIZE_STRING);
            $end_time = filter_input(INPUT_POST, 'end_time', FILTER_SANITIZE_STRING);

            $eventModel = new Event();
            if ($eventModel->create($name, $description, $date, $price, $location, $start_time, $end_time)) {
                header('Location: /events');
                exit;
            } else {
                $this->view('create_event', ['error' => 'Error creating event. Try again.']);
            }
        } else {
            $this->view('create_event');
        }
    }

    public function edit($id) {
        $eventModel = new Event();
        $event = $eventModel->getEventById($id);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
            $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
            $date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING);
            $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $location = filter_input(INPUT_POST, 'location', FILTER_SANITIZE_STRING);
            $start_time = filter_input(INPUT_POST, 'start_time', FILTER_SANITIZE_STRING);
            $end_time = filter_input(INPUT_POST, 'end_time', FILTER_SANITIZE_STRING);

            $update_data = [
                'name' => $name,
                    'description' => $description,
                    'date' => $date,
                    'price' => $price,
                    'location' => $location,
                    'start_time' => $start_time,
                    'end_time' => $end_time
            ];

            if ($eventModel->update($id,$update_data)) {
                header('Location: /events');
                exit;
            } else {
                $this->view('edit_event', ['event' => $event, 'error' => 'Error editing event. Try again.']);
            }
        } else {
            $this->view('edit_event', ['event' => $event]);
        }
    }

    public function delete($id) {
        $eventModel = new Event();
        if ($eventModel->delete($id)) {
            header('Location: /events');
            exit;
        } else {
            $this->view('events', ['error' => 'Error deleting event. Try again.']);
        }
    }
}

