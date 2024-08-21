<?php
use Classes\Router;

spl_autoload_register(function ($className) {
    $filePath = __DIR__ . '/' . str_replace('\\', '/', $className) . '.php';
    if (file_exists($filePath)) {
        require_once $filePath;
    }
});

$router = new Router(require 'routes.php');
$router->route($_SERVER['REQUEST_URI']);
