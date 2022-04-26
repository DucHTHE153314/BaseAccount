<?php

namespace App\Models;

/*
 * Copyright(C) 2022, Base
 * Base Account:
 * Model - Logics - Customer
 *
 * Record of change:
 * DATE            Version             AUTHOR           DESCRIPTION
 * 2022-04-26       1.0                DucHT           First Implement
 */

/**
 * All Logic for <code>Customer</code> models
 */
class CustomerLogics extends CustomerDB {

    /**
     * Get the last Customer's id in the data
     * @return int
     */
    private function getLast() {
        ini_set('display_errors', 0);
        $conn = $this->getDB();
        $sql = "Select Max(Customer_id) as 'maxid' FROM Customer";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
                mysqli_close($conn);
                return $row["maxid"];
            }
        }
        return 1;
    }

    /**
     * Accept an Customer register in the system with his/her Account
     * @param Customer $cus 
     * @param Account $acc
     */
    public function register($full_name, $email, $phone, $password) {
        try {
            $cus = new Customer(0, $full_name, TRUE, NULL, $phone, $email, "");
            $this->insert($cus);
            $acc = new Account($email, $password);
            $AccountDB = new AccountDB();
            $AccountDB->insert($acc);
            $UserDB = new UserDB();
            $cus->setCustomer_id($this->getLast());
            $user = new User($cus, $acc);
            $UserDB->insert($user);
            return TRUE;
        } catch (Exception $ex) {
            return FALSE;
        }
    }

    /**
     * Find an email in the system.<br/>
     * Return 1 if existed. Else, return 0.
     * @param <code>String</code> $email
     * @return string
     */
    public function searchEmail($email) {
        ini_set('display_errors', 0);
        $conn = $this->getDB();
        $sql = "SELECT * FROM Customer WHERE Email = ?";
        $prst = $conn->prepare($sql);
        $prst->bind_param("s", $email);
        $prst->execute();
        $result = $prst->get_result();
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            mysqli_close($conn);
            return '1';
        }
        mysqli_close($conn);
        return '0';
    }

    /**
     * 
     * @param type $phone
     * @return string
     */
    public function searchPhone($phone) {
        ini_set('display_errors', 0);
        $conn = $this->getDB();
        $sql = "SELECT * FROM Customer WHERE Phone = ?";
        $prst = $conn->prepare($sql);
        $prst->bind_param("s", $phone);
        $prst->execute();
        $result = $prst->get_result();
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            mysqli_close($conn);
            return '1';
        }
        mysqli_close($conn);
        return '0';
    }

}
