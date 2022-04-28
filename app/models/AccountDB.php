<?php

namespace App\Models;

use App\Models\Account;

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
class AccountDB extends \Core\Model implements BaseDB {

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
     * get Account by username or email
     * 
     * @param string $key username or email of customer
     * @return Account
     */
    public function getOne($key) {
        ini_set('display_errors', 0);
        $conn = $this->getDB();
        $sql = "with t as (SELECT user_name FROM Customer where user_name = ? Or email = ?)
        SELECT a.* FROM Account a, t WHERE a.user_name = any(select * from t)
        ";
        $prst = $conn->prepare($sql);
        $prst->bind_param("ss", $key, $key);
        $prst->execute();
        $result = $prst->get_result();
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
                $username = $row['user_name'];
                $password = $row['pass_word'];
                $role = $row['role_id'];
                $acc = new Account($username, $password, $role);
                mysqli_close($conn);
                return $acc;
            }
        }
        mysqli_close($conn);
        return null;
    }

    /**
     * 
     * @param type $obj
     */
    public function insert($obj) {
        ini_set('display_errors', 0);
        // Create connection
        $conn = $this->getDB();
        $sql = "INSERT INTO Account(User_name,Pass_word,Role_id) Values (?,?,?)";
        $prst = $conn->prepare($sql);
        $prst->bind_param("ssi", $obj->getUsername(), $obj->getPassword(), $obj->getRole()->getRole_id());
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
