<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Role
 *
 * @author PC
 */
class Role {

    //put your code here
    private $role_id;
    private $description;

    function __construct($role_id, $description) {
        $this->role_id = $role_id;
        $this->description = $description;
    }

    function getRole_id() {
        return $this->role_id;
    }

    function getDescription() {
        return $this->description;
    }

    function setRole_id($role_id) {
        $this->role_id = $role_id;
    }

    function setDescription($description) {
        $this->description = $description;
    }

}
