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

    public function model($model) {
        // Ensure model path is correct
        $modelPath = realpath(dirname(__FILE__) . '/../app/Models/' . $model . '.php');
        
        if (file_exists($modelPath)) {
            require_once $modelPath;
            return new $model();
        } else {
            http_response_code(404);
            die("Model file not found: $model");
        }
    }
}
