<?php
namespace App\Controllers;

use Core\Controller;
use App\Models\User;
use Core\Session;

class AuthController extends Controller {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $userModel = new User();
            $user = $userModel->login($email, $password);

            if ($user) {
                Session::start();
                Session::set('user', $user);
                header('Location: /home');
                exit;
            } else {
                $this->view('login', ['error' => 'Invalid email or password.']);
            }
        } else {
            $this->view('login');
        }
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $userModel = new User();
            if ($userModel->register($name, $email, $password)) {
                header('Location: /login');
                exit;
            } else {
                $this->view('register', ['error' => 'Registration failed. Try again.']);
            }
        } else {
            $this->view('register');
        }
    }

    public function logout() {
        Session::start();
        Session::destroy();
        header('Location: /login');
        exit;
    }
}
