<?php
/*
 * Copyright(C) 2022, Base
 * Base Account:
 * Model - class Database
 *
 * Record of change:
 * DATE            Version             AUTHOR           DESCRIPTION
 * 2022-04-25       1.0                DucHT             First Implement
 */

/**
 *  
 * @author DucHT
 */
class Database{

    public static $host = 'localhost';
    public static $dbName = 'base_account';
    public static $username = 'root';
    public static $password = '';

    private static function connect(){
        $pdo = new PDO('mysql:host='.self::$host.';dbname='.self::$dbName.';charset=utf8', self::$username, self::$password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }

    public static function query($query, $params = array()){
        $statement = self::connect()->prepare($query);
        $statement->execute($params);
        if(explode(' ', $query)[0] == 'SELECT'){
            $data = $statement->fetchAll();
            return $data;
        }
    }
}