<?php

require_once('Connection.php');
require_once('BaseDB.php');
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
    public function getOne($key) {
        
    }

    /**
     * 
     * @param type $obj
     */
    public function insert($obj) {
        ini_set('display_errors', 0);
        $conn = $this->getConnection();
        $sql = "INSERT INTO Customer(Gender,Name,Date_of_birth,Phone,Email,Address) Values (?,?,?,?,?,?)";
        $prst = $conn->prepare($sql);
        $prst->bind_param("isssss", $obj->getGender(), $obj->getName(), $obj->getDate_of_birth(), $obj->getPhone(), $obj->getEmail(), $obj->getAddress());
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

    private function getLast() {
        ini_set('display_errors', 0);
        $conn = $this->getConnection();
        $sql = "Select Max(Customer_id) as 'maxid' FROM Customer";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
                $this->closeConnection($conn);
                return $row["maxid"];
            }
        }
        return 1;
    }

    public function register($cus, $acc) {
        $this->insert($cus);
        $AccountDB = new AccountDB();
        $AccountDB->insert($acc);
        $UserDB = new UserDB();
        $cus->setCustomer_id($this->getLast());
        $user = new User($cus, $acc, 1);
        $UserDB->insert($user);
    }

    public function searchEmail($email) {
        ini_set('display_errors', 0);
        $conn = $this->getConnection();
        $sql = "SELECT * FROM Customer WHERE Email = ?";
        $prst = $conn->prepare($sql);
        $prst->bind_param("s", $email);
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

    public function searchPhone($phone) {
        ini_set('display_errors', 0);
        $conn = $this->getConnection();
        $sql = "SELECT * FROM Customer WHERE Phone = ?";
        $prst = $conn->prepare($sql);
        $prst->bind_param("s", $phone);
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

}
