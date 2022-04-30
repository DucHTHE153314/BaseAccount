<?php

namespace App\Models;

/*
 * Copyright(C) 2022, Base
 * Base Account:
 * Model - class CustomerDB
 *
 * Record of change:
 * DATE            Version             AUTHOR           DESCRIPTION
 * 2022-04-29       2.0                DucHT           Merge with AccountDB
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
        ini_set('display_errors', 0);
        $conn = $this->getDB();
        $sql = "SELECT * FROM Customer where email = ? ";
        $prst = $conn->prepare($sql);
        $prst->bind_param("s", $key);
        $prst->execute();
        $result = $prst->get_result();
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
                $customer_id = $row['customer_id'];
                $first_name = $row['first_name'];
                $last_name = $row['last_name'];
                $position = $row['position'];
                $birth_date = $row['birth_date'];
                $gender = $row['gender'];
                $phone = $row['phone'];
                $email = $row['email'];
                $address = $row['address'];
                $password = $row['password'];
                $role = $row['role_id'];
                $cus = new Customer($customer_id, $first_name, $last_name, $position, $birth_date, $gender, $phone, $email, $address, $password, $role);
                mysqli_close($conn);
                return $cus;
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
        $conn = $this->getDB();
        $sql = "INSERT INTO Customer(first_name,last_name,position,birth_date,gender,email,phone,address,password,role_id) Values (?,?,?,?,?,?,?,?,?,?)";
        $prst = $conn->prepare($sql);
        $prst->bind_param("ssssissssi", $obj->getFirst_name(), $obj->getLast_name(), $obj->getPosition(), $obj->getBirth_date(), $obj->getGender(), $obj->getEmail(), $obj->getPhone(), $obj->getAddress(), $obj->getPassword(), $obj->getRole_id());
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

    /**
     * Search an information of any <code>Customer</code>.
     * 
     * @param string $param An attribute of Customer.
     * @param string $value A value of this attribute.
     * @return boolean <code>True</code> if exists. Else <code>False</code>.
     */
    public function search($param, $value) {
        ini_set('display_errors', 0);
        $conn = $this->getDB();
        $sql = "SELECT * FROM Customer WHERE ? = ?";
        $prst = $conn->prepare($sql);
        $prst->bind_param("ss", $param, $value);
        $prst->execute();
        $result = $prst->get_result();
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            mysqli_close($conn);
            return true;
        }
        mysqli_close($conn);
        return false;
    }

}
