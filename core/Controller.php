<?php

namespace Core;

class Controller {
    public function view($view, $data = []) {
        // Ensure the view path is correct
        $viewPath = realpath(dirname(__FILE__) . '/../app/Views/' . $view . '.php');
        
        if (file_exists($viewPath)) {
            require_once $viewPath;
        } else {
            http_response_code(404);
            die("View file not found: $view");
        }
    }
}
