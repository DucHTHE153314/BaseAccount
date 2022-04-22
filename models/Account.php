<?php

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
 * @author PC
 */
class Account {

    //put your code here
    private $username;
    private $password;
    private $role;

    function __construct($username, $password, $role) {
        $this->username = $username;
        $this->password = $password;
        $this->role = $role;
    }

    function getUsername() {
        return $this->username;
    }

    function getPassword() {
        return $this->password;
    }

    function getRole() {
        return $this->role;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setRole($role) {
        $this->role = $role;
    }
    public function __toString() {
        return $this->getUsername().'++'.$this->getPassword().'++'.$this->getRole()->getDescription();
    }

}
