<?php

//TODO: tach rieng autoload

use ATL\AutoLoad;

require __DIR__ . '\/../' . 'ATL\AutoLoad' . '.php';
ATL\AutoLoad::myAutoLoad();

use Core\Router;


//TODO: rename request path
//TODO: use virtual host
$request = $_SERVER['REQUEST_URI'];
/**
 * Routing
 */
$router = new Router();
// Add the routes
$router->add('/', ['controller' => 'Home', 'action' => 'index']);
$router->add('/{controller}/{action}');
$router->dispatch($request);
