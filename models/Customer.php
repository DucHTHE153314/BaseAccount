<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Customer
 *
 * @author PC
 */
class Customer {

    //put your code here
    private $customer_id;
    private $name;
    private $gender;
    private $date_of_birth;
    private $phone;
    private $email;
    private $address;

    function __construct($customer_id, $name, $gender, $date_of_birth, $phone, $email, $address) {
        $this->customer_id = $customer_id;
        $this->name = $name;
        $this->gender = $gender;
        $this->date_of_birth = $date_of_birth;
        $this->phone = $phone;
        $this->email = $email;
        $this->address = $address;
    }

    function getCustomer_id() {
        return $this->customer_id;
    }

    function getName() {
        return $this->name;
    }

    function getGender() {
        return $this->gender;
    }

    function getDate_of_birth() {
        return $this->date_of_birth;
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

    function setName($name) {
        $this->name = $name;
    }

    function setGender($gender) {
        $this->gender = $gender;
    }

    function setDate_of_birth($date_of_birth) {
        $this->date_of_birth = $date_of_birth;
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
