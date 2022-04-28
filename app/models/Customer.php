<?php

namespace App\Models;

/*
 * Copyright(C) 2022, Base
 * Base Account:
 * Model - class Customer
 *
 * Record of change:
 * DATE            Version             AUTHOR           DESCRIPTION
 * 2022-04-28       2.0                DucHT            New Structure
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
    private $user_name;

    /**
     * Constructor for a Customer
     * 
     * @param int $customer_id required
     * @param string $first_name required
     * @param string $last_name required
     * @param string $position
     * @param date $birth_date
     * @param boolean $gender
     * @param string $phone required
     * @param string $email required
     * @param string $address
     * @param string $user_name required
     */
    function __construct($customer_id, $first_name, $last_name, $position, $birth_date, $gender, $phone, $email, $address, $user_name) {
        $this->customer_id = $customer_id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->position = $position;
        $this->birth_date = $birth_date;
        $this->gender = $gender;
        $this->phone = $phone;
        $this->email = $email;
        $this->address = $address;
        $this->user_name = $user_name;
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

    function getUser_name() {
        return $this->user_name;
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

    function setUser_name($user_name) {
        $this->user_name = $user_name;
    }

}
