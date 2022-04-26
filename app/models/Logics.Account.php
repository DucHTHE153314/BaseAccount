<?php

namespace App\Models;

/*
 * Copyright(C) 2022, Base
 * Base Account:
 * Model - Logics - Account
 *
 * Record of change:
 * DATE            Version             AUTHOR           DESCRIPTION
 * 2022-04-26       1.0                DucHT           First Implement
 */

/**
 * All Logic for <code>Account</code> models
 */
class AccountLogics extends AccountDB
{

    /**
     * 
     * @param string $email
     * @param string $pass
     * @return boolean
     */
    function checkAccount($email, $pass)
    {
        ini_set('display_errors', 0);
        $conn = $this->getDB();
        $sql = "SELECT * FROM Account WHERE User_name = ? and Password = ?";
        $prst = $conn->prepare($sql);
        $prst->bind_param("ss", $email, password_hash($pass, PASSWORD_BCRYPT));
        $prst->execute();
        $result = $prst->get_result();
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            mysqli_close($conn);
            return TRUE;
        }
        mysqli_close($conn);
        return FALSE;
    }

    public function login($email, $pass, $remember)
    {
        if (!$this->checkAccount($email, $pass)) {
        }
    }
}
