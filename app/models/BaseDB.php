<?php

namespace App\Models;

/*
 * Copyright(C) 2022, Base
 * Base Account:
 * Model - interface BaseDB
 *
 * Record of change:
 * DATE            Version             AUTHOR           DESCRIPTION
 * 2022-05-04       2.0                DucHT           Build DB Common Logics
 */

/**
 *
 * @author DucHT
 */
abstract class BaseDB extends \Core\Model {

    /**
     * Get table name
     */
    abstract public static function tableName(): string;

    /**
     * Get table primary key
     */
    abstract public static function primaryKey(): string;

    /**
     * Take all record in this table
     * @return type 
     */
    public function getAll() {
        
    }

    /**
     * Take a record from data with 
     * 
     * @param Array $keys
     * @return Array List properties and values
     */
    public function getOne($keys) {
        ini_set('display_errors', 1);
        $tableName = static::tableName();
        $query = implode("AND", array_map(fn ($attr) => "$attr = :$attr", array_keys($keys)));
        $conn = static::getDB();
        $sql = "SELECT * FROM $tableName where $query ";
        $prst = $conn->prepare($sql);
        foreach ($keys as $key => $item) {
            $prst->bindValue(":$key", $item);
        }
        $prst->execute();
        $result = $prst->fetchAll(\PDO::FETCH_ASSOC);
        foreach ($result as $row) {
            return $row;
        }
        return array();
    }

    /**
     * Insert a record into this table.
     * 
     * @param Array $attributes
     * @return void
     */
    public function insert($attributes) {
        ini_set('display_errors', 0);
        $tableName = static::tableName();
        $attrs = implode(",", array_map(fn ($attr) => "$attr", array_keys($attributes)));
        $values = implode(",", array_map(fn ($attr) => ":$attr", array_keys($attributes)));
        $conn = static::getDB();
        $sql = "INSERT INTO $tableName ( $attrs ) VALUES ($values) ";
        $prst = $conn->prepare($sql);
        foreach ($attributes as $key => $item) {
            $prst->bindValue(":$key", $item);
        }
        $prst->execute();
    }

    /**
     * Allow delete the records in the table with input conditions.
     * @param type $obj
     */
    public function delete($conditions) {
        
    }

    /**
     * Allow update the records in the table with input conditions.
     * @param Array $keys
     * @param Array $params
     */
    public function update($keys, $params) {
        ini_set('display_errors', 0);

        $tableName = static::tableName();
        $attrs = implode(",", array_map(fn ($attr) => "$attr = :$attr", array_keys($params)));
        $key_s = implode("AND", array_map(fn ($k) => "$k = :$k", array_keys($keys)));
        $conn = static::getDB();
        $sql = "UPDATE $tableName SET $attrs WHERE $key_s ";
        $prst = $conn->prepare($sql);

        foreach ($params as $key => $item) {
            $prst->bindValue(":$key", $item);
        }

        foreach ($keys as $key => $item) {
            $prst->bindValue(":$key", $item);
        }
        
        return $prst->execute();
    }

    /**
     * Allow find one or more records in the table with input conditions. 
     * @param type $param
     * @param type $value
     */
    public function search($param, $value) {
        
    }

}
