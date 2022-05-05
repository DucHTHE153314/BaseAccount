<?php

namespace App\Models;

/*
 * Copyright(C) 2022, Base
 * Base Account:
 * Model - class Customer
 *
 * Record of change:
 * DATE            Version             AUTHOR           DESCRIPTION
 * 2022-04-29       3.1                DucHT           Minimize Constructor
 */

/**
 * Description of Customer
 *
 * @author PC
 */
class Customer
{

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
     * Constructor for each Customer
     * 
     * @param Array $params Array of Customer's properties include: 
     * customer_id, first_name, last_name, position, birth_date, gender, phone, email, address, password, role_id
     */
    function __construct($params)
    {
        $this->customer_id = isset($params['customer_id']) ? $params['customer_id'] : 0;
        $this->first_name = isset($params['first_name']) ? $params['first_name'] : "";
        $this->last_name = isset($params['last_name']) ? $params['last_name'] : "";
        $this->position = isset($params['position']) ? $params['position'] : "";
        $this->birth_date = isset($params['birth_date']) ? $params['birth_date'] : "";
        $this->gender = isset($params['gender']) ? $params['gender'] : 1;
        $this->phone = isset($params['phone']) ? $params['phone'] : "";
        $this->email = isset($params['email']) ? $params['email'] : "";
        $this->address = isset($params['address']) ? $params['address'] : "";
        $this->password = isset($params['password']) ? $params['password'] : "";
        $this->role = isset($params['role_id']) ? $params['role_id'] : 2;
    }

    function getPassword()
    {
        return $this->password;
    }

    function getRole()
    {
        return $this->role;
    }

    function setPassword($password)
    {
        $this->password = $password;
    }

    function setRole($role)
    {
        $this->role = $role;
    }

    function getCustomer_id()
    {
        return $this->customer_id;
    }

    function getFirst_name()
    {
        return $this->first_name;
    }

    function getLast_name()
    {
        return $this->last_name;
    }

    function getPosition()
    {
        return $this->position;
    }

    function getBirth_date()
    {
        return $this->birth_date;
    }

    function getGender()
    {
        return $this->gender;
    }

    function getPhone()
    {
        return $this->phone;
    }

    function getEmail()
    {
        return $this->email;
    }

    function getAddress()
    {
        return $this->address;
    }

    function setCustomer_id($customer_id)
    {
        $this->customer_id = $customer_id;
    }

    function setFirst_name($first_name)
    {
        $this->first_name = $first_name;
    }

    function setLast_name($last_name)
    {
        $this->last_name = $last_name;
    }

    function setPosition($position)
    {
        $this->position = $position;
    }

    function setBirth_date($birth_date)
    {
        $this->birth_date = $birth_date;
    }

    function setGender($gender)
    {
        $this->gender = $gender;
    }

    function setPhone($phone)
    {
        $this->phone = $phone;
    }

    function setEmail($email)
    {
        $this->email = $email;
    }

    function setAddress($address)
    {
        $this->address = $address;
    }
}
