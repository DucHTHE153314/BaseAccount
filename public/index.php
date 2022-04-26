<?php

spl_autoload_register(
    function ($class) {
        require __DIR__ . '\/../' . $class . '.php';
    }
);
require '../Core/Router.php';

use Core\Router;

/**
 * Routing
 */
$router = new Router();

// Add the routes
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('{controller}/{action}');
$router->dispatch('');
