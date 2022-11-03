<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
    '/' => "controllers/index.php",
    '/login' => "controllers/login.php",
    '/logout' => "controllers/logout.php",
    '/register' => "controllers/register.php"
];

if (array_key_exists($uri, $routes)) {
    require $routes[$uri];
}
