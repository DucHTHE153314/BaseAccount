<?php

namespace App\Models;

/*
 * Copyright(C) 2022, Base
 * Base Account:
 * Model - class CustomerDB
 *
 * Record of change:
 * DATE            Version             AUTHOR           DESCRIPTION
 * 2022-05-04       2.1                DucHT           Minimize Code
 */

/**
 * Description of CustomerDB
 *
 * @author PC
 */
class CustomerDB extends BaseDB {

    /**
     * Allow delete the records in Customer table with input conditions.
     * @param type $conditions
     */
    public function delete($conditions) {
        
    }

    /**
     * Take all record in Customer table
     * @return type 
     */
    public function getAll() {
        
    }

    /**
     * Take a <code> Customer </code> from database by its primary key
     * 
     * @param type $condition
     * @return \App\Models\Customer
     */
    public function getOne($condition): Customer {
        return new Customer(parent::getOne([$this->primaryKey() => "$condition"]));
    }

    /**
     * Insert new Customer into Customer table.
     * @param type $obj
     */
    public function insert($obj) {
        parent::insert($obj);
    }

    /**
     * Update a Customer in Customer table.
     * @param string $email
     * @param Array $params
     */
    public function update($email, $params) {
        return parent::update(array('email' => $email), $params);
    }

    /**
     * Search an information of any <code>Customer</code>.
     * 
     * @param string $param An attribute of Customer.
     * @param string $value A value of this attribute.
     * @return Customer 
     */
    public function search($param, $value) {
        $params = parent::getOne(array($param => $value));
        return new Customer($params);
    }

    /**
     * Get Table name
     * 
     * @return string
     */
    public static function tableName(): string {
        return "Customer";
    }

    /**
     * Get Primary key
     * 
     * @return string
     */
    public static function primaryKey(): string {
        return "customer_id";
    }

}
