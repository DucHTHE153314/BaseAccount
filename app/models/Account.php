<?php

namespace App\Models;

/*
 * Copyright(C) 2022, Base
 * Base Account:
 * Model - class Account
 *
 * Record of change:
 * DATE            Version             AUTHOR           DESCRIPTION
 * 2022-04-19       1.0                DucHT             First Implement
 */

/**
 * Description of Account
 *
 * @author DucHT
 */
class Account {

    //put your code here
    private $username;
    private $password;

    /**
     * Make a constructor for an Account
     * @param <code>String</code> $username username for Account
     * @param <code>String</code> $password password for Account
     */
    function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;
    }

    function getUsername() {
        return $this->username;
    }

    function getPassword() {
        return $this->password;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    public function __toString() {
        return $this->getUsername() . '++' . $this->getPassword();
    }

}
