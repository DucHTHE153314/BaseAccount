<?php

namespace App\Models;

/*
 * Copyright(C) 2022, Base
 * Base Account:
 * Model - class CustomerDB
 *
 * Record of change:
 * DATE            Version             AUTHOR           DESCRIPTION
 * 2022-04-19       1.0                DucHT           First Implement
 */

/**
 * Description of CustomerDB
 *
 * @author PC
 */
class CustomerDB extends \Core\Model implements BaseDB {

    /**
     * 
     * @param type $obj
     */
    public function delete($obj) {
        
    }

    /**
     * 
     */
    public function getAll() {
        
    }

    /**
     * 
     */
    public function getOne($key) {
        
    }

    /**
     * 
     * @param type $obj
     */
    public function insert($obj) {
        ini_set('display_errors', 0);
        $conn = $this->getDB();
        $sql = "INSERT INTO Customer(first_name,last_name,position,birth_date,gender,email,phone,address,user_name) Values (?,?,?,?,?,?,?,?,?)";
        $prst = $conn->prepare($sql);
        $prst->bind_param("ssssissss", $obj->getFirst_name(), $obj->getLast_name(), $obj->getPosition(), $obj->getBirth_date(), $obj->getGender(), $obj->getEmail(), $obj->getPhone(), $obj->getAddress(), $obj->getUser_name());
        $prst->execute();
        mysqli_close($conn);
    }

    /**
     * 
     * @param type $old
     * @param type $new
     */
    public function update($old, $new) {
        
    }

}
