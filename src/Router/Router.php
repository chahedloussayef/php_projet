<?php

namespace Router;

class Router {
    private $routes = [];

    public function add($url, $controller, $method) {
        $this->routes[$url] = ['controller' => $controller, 'method' => $method];
    }

    public function handleRequest() {
        $requestedUrl = strtok($_SERVER['REQUEST_URI'], '?');  // Supprimer les paramètres GET
        if (isset($this->routes[$requestedUrl])) {
            $controller = new $this->routes[$requestedUrl]['controller']();
            $method = $this->routes[$requestedUrl]['method'];
            $controller->$method();
        } else {
            http_response_code(404);
            echo "404 - Page not found";
        }
    }
}