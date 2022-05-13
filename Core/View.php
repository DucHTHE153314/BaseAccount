<?php

/*
 * Copyright(C) 2022, Base
 * Base Account:
 * Core - Base View
 *
 * Record of change:
 * DATE            Version             AUTHOR           DESCRIPTION
 * 2022-04-26       1.0                DucHT           First Implement
 */

namespace Core;

/**
 * View
 *
 */
class View
{

    /**
     * Render a view file
     *
     * @param string $view  The view file
     * @param array $args  Associative array of data to display in the view (optional)
     *
     * @return void
     */
    public static function render($view, $args = [])
    {
        // Convert keys in $args to variables to use
        extract($args, EXTR_SKIP);
        $file = dirname(__DIR__) . "/App/Views/$view";  

        if (is_readable($file)) {
            require $file;
            return;
        }

        throw new \Exception("$file not found");
    }
}
