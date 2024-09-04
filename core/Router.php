<?php
class Router {
    private $routes = [];

    public function addRoute($method, $path, $handler) {
        $routeKey = $method . '-' . $path;
        $this->routes[$routeKey] = [
            'method' => $method,
            'path' => $path,
            'handler' => $handler
        ];
    }
    private function Params($method) {
        if($method === 'GET'){
            $queryParams = [];
            if (isset($_SERVER['QUERY_STRING'])) {
                parse_str($_SERVER['QUERY_STRING'], $queryParams);
            }
            return $queryParams;
        }
        return $_POST;
    }
    public function get($path, $handler) {
        $this->addRoute('GET', $path, $handler);
    }
    public function post($path, $handler) {
        $this->addRoute('POST', $path, $handler);
    }
    public function handleRequest($method, $uri) {
        $routeKey = $method . '-' . $uri;
        
        if (isset($this->routes[$routeKey])) {
            $handler = $this->routes[$routeKey]['handler'];
            if (is_callable($handler)) {
                $handler($this->Params($method));
            } else {
                echo "Handler is not callable.";
            }
            return;
        }
        // If no matching route is found, handle as 404 Not Found
        http_response_code(404);
        echo '403 Not Found '.$method.' method '.$uri.' path';
    }
    
}
