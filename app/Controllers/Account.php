<?php

namespace App\Controllers;

/*
 * Copyright(C) 2022, Base
 * Base Account:
 * Controller - Account
 *
 * Record of change:
 * DATE            Version             AUTHOR           DESCRIPTION
 * 2022-04-26       1.0                DucHT           First Implement
 */

use App\Models\AccountLogics;
use App\Models\CustomerLogics;
use \Core\View;
use \Core\Controller;

/**
 * Account Controller
 */
class Account extends Controller
{
    /**
     * Handling login action of customer.
     * @return void
     */
    public function loginAction()
    {
        if (isset($_POST["lemail"]) && isset($_POST["lpassword"]) && isset($_POST["lremember"])) {
            $email = $_POST["lemail"];
            $pass = $_POST["lpassword"];
            $remember = $_POST["lremember"];
            $logics = new AccountLogics();
            $result = $logics->login($email, $pass, $remember);
            if ($result === 1) {
                View::render('infor.php');
            } elseif ($result === 0) {
                View::render('login.php');
            } else {
                View::render('login.php');
            }
        } else {
            View::render('login.php');
        }
    }

    /**
     * Handling register action of customer.
     * @return void
     */
    public function registerAction()
    {
        if (isset($_POST["first_name"]) && isset($_POST["last_name"]) && isset($_POST["register_email"]) && isset($_POST["register_phone"]) && isset($_POST["register_password"])) {
            $first_name = $_POST["first_name"];
            $last_name = $_POST["last_name"];
            $email = $_POST["register_email"];
            $phone = $_POST["register_phone"];
            $password = $_POST["register_password"];
            $Logics = new CustomerLogics();
            $Logics->register($first_name, $last_name, $phone, $email, $password);
            View::render('infor.php');
        } else {
            View::render('register.php');
        }
    }

    public function recoverAction()
    {
        if (isset($_POST["remail"])) {
        }
    }
}
