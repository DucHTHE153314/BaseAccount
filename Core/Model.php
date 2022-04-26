<?php
/*
 * Copyright(C) 2022, Base
 * Base Account:
 * Core - Base Model
 *
 * Record of change:
 * DATE            Version             AUTHOR           DESCRIPTION
 * 2022-04-26       1.0                DucHT           First Implement
 */
namespace Core;
use App\Configs;

/**
 * Base model
 *
 */
abstract class Model
{

    /**
     * Get the MYSQLi database connection
     *
     * @return mixed
     */
    protected static function getDB()
    {
        static $db = null;

        if ($db === null) {
            $db = mysqli_connect(Configs::DB_HOST, Configs::DB_USER, Configs::DB_PASSWORD, Configs::DB_NAME);
        }

        return $db;
    }

}
