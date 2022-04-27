<?php
spl_autoload_register(
    function ($class) {
        require __DIR__ . '\/../' . $class . '.php';
    }
);

use Core\Router;

$request = str_replace("/BaseAccount/",'',$_SERVER['REQUEST_URI']);
// echo "<script>alert('" . $request . "');</script>";
/**
 * Routing
 */
$router = new Router();
// Add the routes
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('Account/login', ['controller' => 'Account', 'action' => 'login']);
$router->add('{controller}/{action}');
$router->dispatch($request);
