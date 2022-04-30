<?php

namespace App\Models;

/*
 * Copyright(C) 2022, Base
 * Base Account:
 * Model - class Customer
 *
 * Record of change:
 * DATE            Version             AUTHOR           DESCRIPTION
 * 2022-04-29       3.0                DucHT            Merge with Account
 */

/**
 * Description of Customer
 *
 * @author PC
 */
class Customer {

    //put your code here
    private $customer_id;
    private $first_name;
    private $last_name;
    private $position;
    private $birth_date;
    private $gender;
    private $phone;
    private $email;
    private $address;
    private $password;
    private $role;

    /**
     * Constructor of each <code>Customer</code>
     * 
     * @param type $customer_id
     * @param type $first_name
     * @param type $last_name
     * @param type $position
     * @param type $birth_date
     * @param type $gender
     * @param type $phone
     * @param type $email
     * @param type $address
     * @param type $password
     * @param type $role
     */
    function __construct($customer_id, $first_name, $last_name, $position, $birth_date, $gender, $phone, $email, $address, $password, $role) {
        $this->customer_id = $customer_id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->position = $position;
        $this->birth_date = $birth_date;
        $this->gender = $gender;
        $this->phone = $phone;
        $this->email = $email;
        $this->address = $address;
        $this->password = $password;
        $this->role = $role;
    }

    function getPassword() {
        return $this->password;
    }

    function getRole() {
        return $this->role;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setRole($role) {
        $this->role = $role;
    }

    function getCustomer_id() {
        return $this->customer_id;
    }

    function getFirst_name() {
        return $this->first_name;
    }

    function getLast_name() {
        return $this->last_name;
    }

    function getPosition() {
        return $this->position;
    }

    function getBirth_date() {
        return $this->birth_date;
    }

    function getGender() {
        return $this->gender;
    }

    function getPhone() {
        return $this->phone;
    }

    function getEmail() {
        return $this->email;
    }

    function getAddress() {
        return $this->address;
    }

    function setCustomer_id($customer_id) {
        $this->customer_id = $customer_id;
    }

    function setFirst_name($first_name) {
        $this->first_name = $first_name;
    }

    function setLast_name($last_name) {
        $this->last_name = $last_name;
    }

    function setPosition($position) {
        $this->position = $position;
    }

    function setBirth_date($birth_date) {
        $this->birth_date = $birth_date;
    }

    function setGender($gender) {
        $this->gender = $gender;
    }

    function setPhone($phone) {
        $this->phone = $phone;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setAddress($address) {
        $this->address = $address;
    }

}
