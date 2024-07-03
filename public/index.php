<?php
session_start();

$routes = include "../config/routes.php";
$requestMethod = $_SERVER['REQUEST_METHOD'];
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if (isset($routes["$requestMethod$requestUri"])) {
    $handler = explode('::', $routes["$requestMethod$requestUri"]);

    if (isset($handler[0]) && isset($handler[1])) {
        $controllerClass = $handler[0];
        $method = $handler[1];

        $controller = new $controllerClass();
        $controller->handle();
    } else {
        http_response_code(404);
        echo "404 Not Found";
    }
} else {
    include "../src/view/view.php";
}
?>