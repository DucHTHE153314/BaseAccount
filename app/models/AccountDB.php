<?php
namespace App\Models;

require('Account.php');
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
class AccountDB extends \Core\Model implements BaseDB{

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
