<?php

/*
 * Copyright(C) 2022, Base
 * Base Account:
 * Core - Base Route
 *
 * Record of change:
 * DATE            Version             AUTHOR           DESCRIPTION
 * 2022-04-26       1.0                DucHT           First Implement
 */

namespace Core;

/**
 * Router
 *
 */
class Router
{

    /**
     * Routing table
     * @var array
     */
    protected $routes = [];

    /**
     * Parameters from the matched route
     * @var array
     */
    protected $params = [];

    /**
     * Add a route to the routing table
     *
     * @param string $route  The route URL
     * @param array  $params Parameters (controller, action, etc.)
     *
     * @return void
     */
    public function add($route, $params = [])
    {
        // Convert the route to a regular expression: escape forward slashes
        $route = preg_replace('/\//', '\\/', $route);

        // Convert variables e.g. {controller}
        $route = preg_replace('/\{([a-z]+)\}/', '(?P<\1>[a-z-]+)', $route);

        // Convert variables with custom regular expressions e.g. {id:\d+}
        $route = preg_replace('/\{([a-z]+):([^\}]+)\}/', '(?P<\1>\2)', $route);

        // Add start and end delimiters, and case insensitive flag
        $route = '/^' . $route . '$/i';

        $this->routes[$route] = $params;
    }

    /**
     * Get all the routes from the routing table
     *
     * @return array
     */
    public function getRoutes()
    {
        return $this->routes;
    }

    /**
     * Match the route to the routes in the routing table, setting the $params
     * property if a route is found.
     *
     * @param string $url The route URL
     *
     * @return bool  true if a match found, false otherwise
     */
    public function match($url): bool
    {
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url, $matches)) {
                // Get named capture group values
                foreach ($matches as $key => $match) {
                    if (is_string($key)) {
                        $params[$key] = $match;
                    }
                }
                $this->params = $params;
                return true;
            }
        }

        return false;
    }

    /**
     * Get the currently matched parameters
     *
     * @return array
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * Dispatch the route, creating the controller object and running the
     * action method
     *
     * @param string $url The route URL
     *
     * @return void
     */
    public function dispatch($url)
    {
        $url = $this->removeURLVariables($url);
        if (!$this->match($url)) {
            View::render("error.php", array('error' => 'No route matched.'));
        }
        $controller = $this->params['controller'];
        if ($controller == 'Validate') {
            $controller = 'App\Services\\' . $controller;
        } else {
            $controller = 'App\Controllers\\' . $controller;
        }
        if (!class_exists($controller)) {
            View::render("error.php", array('error' => "Controller not found!"));
        }
        $controller_object = new $controller($this->params);
        $action = $this->params['action'];
        if (preg_match('/action$/i', $action) !== 0) {
            View::render("error.php", array('error' => "Method \"".$action."\" cannot be called directly - remove the Action suffix to call this method!"));
        }
        try {
            $controller_object->$action();
        } catch (\Exception $e) {
            View::render("error.php", array('error' => "Method $action not exist!"));
        }
    }

    /**
     * Remove the query string variables from the URL.
     *
     * @param string $url The full URL
     *
     * @return string The URL with the query string variables removed
     */
    protected function removeURLVariables($url): string
    {
        if ($url != '') {
            $parts = explode('?', $url, 2);
            if (strpos($parts[0], '=') === false) {
                $url = $parts[0];
            } else {
                $url = '';
            }
        }

        return $url;
    }
}
