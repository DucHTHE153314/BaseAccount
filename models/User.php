<?php

/*
 * Copyright(C) 2022, Base
 * Base Account:
 * Model - class User
 *
 * Record of change:
 * DATE            Version             AUTHOR           DESCRIPTION
 * 2022-04-19       1.0                DucHT             First Implement
 */

/**
 * Description of User
 *
 * @author PC
 */
class User {

    //put your code here
    private $customer;
    private $account;
    private $status;

    function __construct($customer, $account, $status) {
        $this->customer = $customer;
        $this->account = $account;
        $this->status = $status;
    }

    function getCustomer() {
        return $this->customer;
    }

    function getAccount() {
        return $this->account;
    }

    function getStatus() {
        return $this->status;
    }

    function setCustomer($customer) {
        $this->customer = $customer;
    }

    function setAccount($account) {
        $this->account = $account;
    }

    function setStatus($status) {
        $this->status = $status;
    }

}
