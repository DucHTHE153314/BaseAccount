<?php

namespace App\Models;

/*
 * Copyright(C) 2022, Base
 * Base Account:
 * Model - Logics - Customer
 *
 * Record of change:
 * DATE            Version             AUTHOR           DESCRIPTION
 * 2022-05-12       2.1                DucHT           Change logics
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
    public function register($first_name, $last_name, $phone, $email, $password) {

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
     * @return string
     */
    public function recovery($email) {
        $user = $this->search('email', $email);
        if ($user->getEmail() == null) {
            return '0';
        }
        $to = $user->getEmail();
        $subject = "Recover password!";
        $new_pass = $this->RandomPassword();
        $txt = "Hello ".$user->getFullName()."\r\n"."Your new password is: ".$new_pass;
        $headers = "From: base.beta@gmail.com" . "\r\n";

        if(mail($to,$subject,$txt,$headers)){
            $this->update($user->getEmail(),['password'=>password_hash($new_pass, PASSWORD_DEFAULT)]);
        }

        return '1';
    }
    function RandomPassword() {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randstring = '';
        for ($i = 0; $i < 10; $i++) {
            $randstring .= $characters[rand(0, strlen($characters))];
        }
        return $randstring;
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
        return $this->search("phone", $phone);
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
}
