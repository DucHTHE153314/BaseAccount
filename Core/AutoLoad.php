<?php

/*
 * Copyright(C) 2022, Base
 * Base Account:
 * Core - Autoload
 *
 * Record of change:
 * DATE            Version             AUTHOR           DESCRIPTION
 * 2022-04-26       1.0                DucHT           First Implement
 */

namespace Core;

/**
 * Description of AutoLoad
 *
 * @author PC
 */
class AutoLoad {

    /**
     * Constructor for Autoload
     */
    function __construct() {
        
    }

    /**
     * Allow an autoload call back
     * @return type 
     */
    static function myAutoLoad() {
        spl_autoload_register(
                function ($class) {
            try {
                require __DIR__ . '\/../' . $class . '.php';
            } catch (\Exception $e) {
                throw $e;
            }
        }
        );
    }

}
