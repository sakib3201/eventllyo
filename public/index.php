<?php
require_once '../vendor/autoload.php';

use Core\Session;
use Core\Router;

Session::start();

// Initialize the router
$router = new Router();
require_once '../routes/web.php';

// Handle the request
$uri = preg_replace('/^\/eventllyo\/public/', '', $_SERVER['REQUEST_URI']);
$router->dispatch($uri);

