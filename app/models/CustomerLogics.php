<?php

namespace App\Models;

/*
 * Copyright(C) 2022, Base
 * Base Account:
 * Model - Logics - Customer
 *
 * Record of change:
 * DATE            Version             AUTHOR           DESCRIPTION
 * 2022-04-29       2.0                DucHT           Merge with AccountLogics
 */

/**
 * All Logic for <code>Customer</code> models
 */
class CustomerLogics extends CustomerDB
{

    /**
     * Allow user to login into system.
     * 
     * @param string $email
     * @param bool $remember
     * @return Customer|type
     */
    public function login($email, $remember): Customer {

        if ($remember) {
            setcookie("User", $email, time() + (86400 * 15), "/"); // 15 days
        }
        
        $_SESSION['User'] = $email;

        return $this->search('email', $email);
    }

    /**
     * Accept an Customer register in the system with his/her Information
     * 
     * @param string $first_name
     * @param string $last_name
     * @param string $phone
     * @param string $email
     * @param string $password
     * @return Customer|type
     */
    public function register($first_name, $last_name, $phone, $email, $password)  {
        
        $hash_password = password_hash($password, PASSWORD_DEFAULT);
        $this->insert(array("first_name" => $first_name, "last_name" => $last_name, "phone" => $phone, "email" => $email, "password" => $hash_password, "role_id" => 2));
        $_SESSION["User"] = "$email";

        return $this->search('email', $email);
    }

    /**
     * Allow update <code>Customer</code> information.
     * 
     * @param type $email
     * @param type $params
     * @return type
     */
    public function update($email, $params) {
        return parent::update($email, $params);
    }

    /**
     * 
     * @param type $email
     * @return string|int
     */
    public function recovery($email) {
        if ($this->search('email', $email) == null) {
            return '0';
        }

        $msg = "hehehehhehehehehhe";
        mail("$email", "hihi", $msg);
        return 1;
    }
    /**
     * Find a phone in the system.<br/>
     * Return 1 if existed. Else, return 0.
     * 
     * @param type $phone
     * @return type
     */
    public function searchPhone($phone) {
        return $this->search("phone", $phone);
    }
    /**
     * Find an email in the system.<br/>
     * Return a customer if existed. Else, return null.
     * 
     * @param <code>String</code> $email
     * @return type
     */
    public function searchEmail($email) {
        return $this->search("email", $email);
    }
}
