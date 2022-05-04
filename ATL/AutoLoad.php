<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ATL;

/**
 * Description of AutoLoad
 *
 * @author PC
 */
class AutoLoad
{

    //put your code here
    function __construct()
    {
    }

    static function myAutoLoad()
    {
        spl_autoload_register(
            function ($class) {
                require __DIR__ . '\/../' . $class . '.php';
            }
        );
    }
}
