<?php

namespace App\Models;

/*
 * Copyright(C) 2022, Base
 * Base Account:
 * Model - class CustomerDB
 *
 * Record of change:
 * DATE            Version             AUTHOR           DESCRIPTION
 * 2022-04-29       2.1                DucHT           Minimize Code
 */

/**
 * Description of CustomerDB
 *
 * @author PC
 */
class CustomerDB extends BaseDB
{

    /**
     * 
     * @param type $obj
     */
    public function delete($obj)
    {
    }

    /**
     * 
     */
    public function getAll()
    {
    }

    /**
     * 
     */
    public function getOne($key)
    {
        return parent::getOne(["{$this->primaryKey()}" => "$key"]);
    }

    /**
     * 
     * @param type $obj
     */
    public function insert($obj)
    {
        parent::insert($obj);
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
     * Search an information of any <code>Customer</code>.
     * 
     * @param string $param An attribute of Customer.
     * @param string $value A value of this attribute.
     * @return Customer True if exists. Else False.
     */
    public function search($param, $value)
    {
        return new Customer(parent::getOne(["$param" => "$value"]));
    }

    /**
     * Get Table name
     * 
     * @return string
     */
    public static function tableName(): string
    {
        return "Customer";
    }

    /**
     * Get Primary key
     * 
     * @return string
     */
    public static function primaryKey(): string
    {
        return "Customer_id";
    }
}
