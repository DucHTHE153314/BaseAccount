<?php

require_once('Connection.php');
require_once('BaseDB.php');
require_once('Account.php');
/*
 * Copyright(C) 2022, Base
 * Base Account:
 * Model - class AcountDB
 *
 * Record of change:
 * DATE            Version             AUTHOR           DESCRIPTION
 * 2022-04-19       1.0                DucHT             First Implement
 */

/**
 * Description of AccountDB
 *
 * @author DucHT
 */
class AccountDB extends Connection implements BaseDB {

    /**
     * 
     * @param <code>string</code> $obj
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
        // Create connection
        $conn = $this->getConnection();
        $sql = "INSERT INTO Account(Username,Password,Role_id) Values (?,?,?)";
        $prst = $conn->prepare($sql);
        $prst->bind_param("ssi", $obj->getUsername(), $obj->getPassword(), $obj->getRole()->getRole_id());
        $prst->execute();
        $this->closeConnection($conn);
    }

    public function checkAccount($email, $pass) {
        ini_set('display_errors', 0);
        $conn = $this->getConnection();
        $sql = "SELECT * FROM Account WHERE Username = ? and Password = ?";
        $prst = $conn->prepare($sql);
        $prst->bind_param("ss", $email, password_hash($pass, PASSWORD_BCRYPT));
        $prst->execute();
        $result = $prst->get_result();
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            $this->closeConnection($conn);
            return '1';
        }
        $this->closeConnection($conn);
        return '0';
    }

    /**
     * 
     * @param type $old
     * @param type $new
     */
    public function update($old, $new) {
        
    }

}
