<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
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
