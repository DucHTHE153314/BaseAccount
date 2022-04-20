<?php

/*
 * Copyright(C) 2022, Base
 * Base Account:
 * Model - class Role
 *
 * Record of change:
 * DATE            Version             AUTHOR           DESCRIPTION
 * 2022-04-19       1.0                DucHT             First Implement
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
