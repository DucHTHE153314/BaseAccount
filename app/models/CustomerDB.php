<?php

namespace App\Models;

require_once('Customer.php');
require_once('UserDB.php');
require_once('User.php');
require_once('AccountDB.php');
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
        $sql = "INSERT INTO Customer(Gender,Name,birth_date,Phone,Email,Address) Values (?,?,?,?,?,?)";
        $prst = $conn->prepare($sql);
        $prst->bind_param("isssss", $obj->getGender(), $obj->getName(), $obj->getDate_of_birth(), $obj->getPhone(), $obj->getEmail(), $obj->getAddress());
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
