<?php

require __DIR__ . '\/../' . 'Core\AutoLoad' . '.php';
Core\AutoLoad::myAutoLoad();


use Core\Router;

if (session_id() == '') {
    session_start();
}
$request = $_SERVER['REQUEST_URI'];
/**
 * Routing
 */
$router = new Router();
// Add the routes
$router->add('/', ['controller' => 'Home', 'action' => 'index']);
$router->add('/{controller}/{action}');
$router->dispatch($request);

