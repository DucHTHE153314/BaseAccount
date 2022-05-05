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
abstract class BaseDB extends \Core\Model
{

    /**
     * 
     */
    abstract public static function tableName(): string;

    /**
     * 
     */
    abstract public static function primaryKey(): string;

    //TODO: consider implement DB logic here
    public function getAll()
    {
    }

    /**
     * 
     * @param Array $keys
     * @return type
     */
    public function getOne($keys)
    {
        $tableName = static::tableName();
        $query = implode("AND", array_map(fn ($attr) => "$attr = :$attr", array_keys($keys)));
        $conn = $this->getDB();
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
        return null;
    }

    /**
     * 
     * @param Array $attributes
     * @return boolean
     */
    public function insert($attributes)
    {
        ini_set('display_errors', 0);
        $tableName = static::tableName();
        $attrs = implode(",", array_map(fn ($attr) => "$attr", array_keys($attributes)));
        $values = implode(",", array_map(fn ($attr) => ":$attr", array_keys($attributes)));
        $conn = $this->getDB();
        $sql = "INSERT INTO $tableName( $attrs ) VALUES ($values) ";
        $prst = $conn->prepare($sql);
        foreach ($attributes as $key => $item) {
            $prst->bindValue(":$key", $item);
        }
        $prst->execute();
        return true;
    }

    /**
     * 
     * @param type $obj
     */
    public function delete($obj)
    {
    }

    /**
     * 
     * @param type $old
     * @param type $new
     */
    public function update($old, $new)
    {
    }

    /**
     * 
     * @param type $param
     * @param type $value
     */
    public function search($param, $value)
    {
    }
}
