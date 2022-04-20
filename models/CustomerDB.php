<?php

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
class CustomerDB extends Connection implements BaseDB {

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
    public function getOne() {
        
    }

    /**
     * 
     * @param type $obj
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

    public function searchEmail($email): bool {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "baseaccount";
        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "SELECT * FROM Customer WHERE Email = ?";
        $prst = $conn->prepare($sql);
        $prst->bind_param("i", $email);
        $prst->execute();
        $result = $prst->get_result();

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
                mysqli_close($conn);
                return TRUE;
            }
        }
        mysqli_close($conn);
        return FALSE;
    }

}
