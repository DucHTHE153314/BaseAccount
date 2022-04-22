<?php

require_once('Connection.php');
require_once('BaseDB.php');
require_once('Role.php');
/*
 * Copyright(C) 2022, Base
 * Base Account:
 * Model - class RoleDB
 *
 * Record of change:
 * DATE            Version             AUTHOR           DESCRIPTION
 * 2022-04-19       1.0                DucHT             First Implement
 */

/**
 * Description of RoleDB
 *
 * @author PC
 */
class RoleDB extends Connection implements BaseDB {

    /**
     * This method alow delete a role by its id.
     * @param <code>integer</code> $obj 
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
        ini_set('display_errors', 0);
        $conn = $this->getConnection();
        $sql = "SELECT * FROM Role WHERE Role_id = ?";
        $prst = $conn->prepare($sql);
        $prst->bind_param("i", $key);
        $prst->execute();
        $result = $prst->get_result();
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
                $re = new Role($row["Role_id"], $row["Description"]);
                $this->closeConnection($conn);
                return $re;
            }
        } else {
            return NULL;
        }
    }

    /**
     * 
     * @param <code>Role</code> $obj
     */
    public function insert($obj) {
        
    }

    /**
     * 
     * @param type $old
     * @param type $new
     */
    public function update($old, $new) {
        
    }

}
