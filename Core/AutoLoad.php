<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
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
