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
     * Check an valid of customer with customer's email and password.
     * @param string $email
     * @param string $pass
     * @param boolean $remember
     * @return int -1 if email not exist. 0 if wrong password. else 1.
     */
    public function login($email, $pass, $remember)
    {
        $acc = $this->search("email", $email);

        if ($acc === null) {
            return -1;
        }
        if (!password_verify($pass, $acc->getPassword())) {
            return 0;
        }
        if ($remember) {
            setcookie("User", $email, time() + (86400 * 15), "/"); // 15 days
        }
        if (session_id() === '') {
            session_start();
        }
        $_SESSION['User'] = $email;
        return 1;
    }

    /**
     * Accept an Customer register in the system with his/her Information
     * 
     * @param string $first_name
     * @param string $last_name
     * @param string $phone
     * @param string $email
     * @param string $password
     * @return Customer
     */
    public function register($first_name, $last_name, $phone, $email, $password)
    {
        $hash_password = password_hash($password, PASSWORD_DEFAULT);
        $this->insert(["first_name" => $first_name, "last_name" => $last_name, "phone" => $phone, "email" => $email, "password" => $hash_password, "role_id" => 2]);
        session_start();
        $_SESSION["User"] = "$email";
        return $this->getOne($email);
    }
    public function update($email, $params)
    {
        return parent::update($email, $params);
    }

    /**
     * Find an email in the system.<br/>
     * Return a customer if existed. Else, return null.
     * 
     * @param <code>String</code> $email
     * @return type
     */
    public function searchEmail($email)
    {
        return $this->search("email", $email);
    }

    /**
     * Find a phone in the system.<br/>
     * Return 1 if existed. Else, return 0.
     * 
     * @param type $phone
     * @return type
     */
    public function searchPhone($phone)
    {
        return $this->search("Phone", $phone);
    }
    public function checkPass($email, $pass)
    {
        $acc = $this->search("email", $email);
        if (!password_verify($pass, $acc->getPassword())) {
            return false;
        }
        return true;
    }
    public function recovery($email)
    {
        if ($this->searchEmail($email) == null) {
            return '0';
        } else {
            $msg = "hehehehhehehehehhe";
            mail("$email", "hihi", $msg);
            return 1;
        }
    }
}
