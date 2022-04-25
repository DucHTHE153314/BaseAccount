<?php

require_once('Connection.php');
require_once('BaseDB.php');
/*
 * Copyright(C) 2022, Base
 * Base Account:
 * Model - class UserDB
 *
 * Record of change:
 * DATE            Version             AUTHOR           DESCRIPTION
 * 2022-04-19       1.0                DucHT             First Implement
 */

/**
 * Description of UserDB
 *
 * @author PC
 */
class UserDB extends Connection implements BaseDB {

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
        $conn = $this->getConnection();
        $sql = "INSERT INTO User(Customer_id,Username,Status) Values (?,?,?)";
        $prst = $conn->prepare($sql);
        $prst->bind_param("isi", $obj->getCustomer()->getCustomer_id(), $obj->getAccount()->getUsername(), $obj->getStatus());
        $prst->execute();
        $this->closeConnection($conn);
    }

    /**
     * 
     * @param type $old
     * @param type $new
     */
    public function update($old, $new) {
        
    }

}
