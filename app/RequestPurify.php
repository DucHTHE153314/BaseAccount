<?php

namespace app;
/*
 * Copyright(C) 2022, Base
 * Base Account:
 * App - RequestPurify
 *
 * Record of change:
 * DATE            Version             AUTHOR           DESCRIPTION
 * 2022-04-28       1.0                DucHT           First Implement
 */

/**
 * 
 */
trait RequestPurify
{

    /**
     * 
     * @param type $param
     * @return string
     */
    static function get($param)
    {
        if (isset($_GET[$param])) {
            $val = $_GET[$param];
            return $val;
        } else {
            return null;
        }
    }

    /**
     * 
     * @param type $param
     * @return string
     */
    static function post($param)
    {
        if (isset($_POST["$param"])) {
            $val = $_POST["$param"];
            return $val;
        } else {
            return null;
        }
    }
}
