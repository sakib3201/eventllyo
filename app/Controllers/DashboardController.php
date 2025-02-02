<?php
namespace App\Controllers;

use Core\Controller;
use App\Models\Event;
use Core\Session;

class DashboardController extends Controller {
    /**
     * The index page for the dashboard. If the user is not logged in, redirect them to the login page.
     * If the user is a regular user, show them their bookings. If the user is an admin, show them all events.
     * @return void
     */
    public function index() {
        if (!Session::get('user')) {
            Session::set('error', 'You need to be logged in first');
            header('Location: /auth/login');
            exit;
        }

        $user = Session::get('user');
        if ($user['role'] === 'user') {
            $bookings = [];

            $this->view('user_dashboard',['bookings' =>$bookings]);
        } else {
            $eventModel = new Event();
            $events = $eventModel->all();
            $this->view('admin_dashboard',['events' => $events]);
        }
    }
}