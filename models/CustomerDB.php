<?php

include 'Connection.php';
include 'BaseDB.php';
include 'Customer.php';
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
        $this->clear();
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
        $sql = "INSERT INTO Customer(Gender,Name,Date_of_birth,Phone,Email,Address) Values (?,?,?,?,?,?)";
        $prst = $conn->prepare($sql);
        $prst->bind_param("isssss", $obj->getGender(), $obj->getName(), $obj->getDate_of_birth(), $obj->getPhone(), $obj->getEmail(), $obj->getAddress());
        $prst->execute();
        mysqli_close($conn);
        return NULL;
    }

    /**
     * 
     * @param type $old
     * @param type $new
     */
    public function update($old, $new) {
        
    }

    public function register($cus, $acc) {
        $this->insert($cus);
    }

    public function searchEmail($email) {
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
        $prst->bind_param("s", $email);
        $prst->execute();
        $result = $prst->get_result();
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            mysqli_close($conn);
            return 1;
        }
        mysqli_close($conn);
        return 0;
    }

    public function searchPhone($phone) {
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
        $sql = "SELECT * FROM Customer WHERE Phone = ?";
        $prst = $conn->prepare($sql);
        $prst->bind_param("s", $phone);
        $prst->execute();
        $result = $prst->get_result();
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            mysqli_close($conn);
            return 1;
        }
        mysqli_close($conn);
        return 0;
    }

}
