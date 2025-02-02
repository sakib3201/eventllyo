<?php

require_once '../core/Session.php';
require_once '../core/Router.php';

use Core\Session;
use Core\Router;

Session::start();

// Initialize the router
$router = new Router();
require_once '../routes/web.php';

// Handle the request
$router->dispatch($_SERVER['REQUEST_URI']);

