<?php
namespace App\Controllers;

use Core\Controller;
use App\Models\User;
use Core\Session;

class AuthController extends Controller {
    /**
     * Handles the login process for users. If the request method is POST, it
     * retrieves the user's email and password from the form, authenticates
     * them, and starts a session if successful. Redirects the user to the 
     * homepage upon successful login, or displays an error message on failure.
     * If the request method is not POST, it simply displays the login view.
     */
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $password = filter_input(INPUT_POST, 'password');

            $userModel = new User();
            $user = $userModel->login($email, $password);

            if ($user && password_verify($password, $user['password'])) {
                Session::start();
                Session::set('user', $user);
                header('Location: /');
                exit;
            } else {
                $this->view('login', ['error' => 'Invalid email or password']);
            }
        } else {
            $this->view('login');
        }
    }

    /**
     * Handles the registration process for users. If the request method is POST, it
     * retrieves the user's name, email, password, and role from the form, creates a
     * new user in the database, and starts a session if successful. Redirects the
     * user to the login page upon successful registration, or displays an error
     * message on failure. If the request method is not POST, it simply displays
     * the registration view.
     */
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
            $email = trim(filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL));
            $password = trim(filter_input(INPUT_POST, 'password'));

            $userModel = new User();
            if ($userModel->register($name, $email, $password)) {
                header('Location: /auth/login');
                exit;
            } else {
                $this->view('register', ['error' => 'Registration failed. Try again.']);
            }
        } else {
            $this->view('register');
        }
    }

    public function logout(): void
    {
        session_start();
        session_destroy();
        header('Location: /auth/login');
        exit;
    }
}

