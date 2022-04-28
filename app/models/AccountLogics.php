<?php

namespace App\Models;

/*
 * Copyright(C) 2022, Base
 * Base Account:
 * Model - Logics - Account
 *
 * Record of change:
 * DATE            Version             AUTHOR           DESCRIPTION
 * 2022-04-28       2.0                DucHT           Move DB controll to DBclass
 */

/**
 * All Logic for <code>Account</code> models
 */
class AccountLogics extends AccountDB
{

    /**
     * Check an valid of customer with his/her email/username and password.
     * @param string $email
     * @param string $pass
     * @param boolean $remember
     * @return int -1 if username not exist. 0 if wrong password. else 1.
     */
    public function login($email, $pass, $remember)
    {
        $acc = $this->getOne($email);
        if ($acc === null) {
            return -1;
        }
        if (password_verify($acc->getPassword(), $pass)) {
            return 0;
        }
        if ($remember) {
            setcookie("User", $email, time() + (86400 * 15), "/"); // 15 days
        }
        session_start();
        $_SESSION["User"] = "";
        return 1;
    }
}
