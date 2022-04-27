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
        if (isset($_POST["lemail"]) && isset($_POST["lpassword"]) && isset($_POST["remember"])) {
            $email = $_POST["lemail"];
            $pass = $_POST["lpassword"];
            $remember = $_POST["remember"];
            $logics = new AccountLogics();
            $logics->login($email, $pass, $remember);
            die("OK");
            View::render('infor.php');
        }else{
            View::render('login.html');
        }
    }

    /**
     * Handling register action of customer.
     * @return void
     */
    public function registerAction()
    {
        if (isset($_POST["full_name"]) && isset($_POST["register_email"]) && isset($_POST["register_phone"]) && isset($_POST["register_password"])) {
            $full_name = $_POST["fullname"];
            $email = $_POST["email"];
            $phone = $_POST["phone"];
            $password = $_POST["password"];
            $Logics = new CustomerLogics();
            $Logics->register($full_name, $email, $phone, $password);
            View::render('infor.php');
        } else{
            View::render('register.html');
        }
    }
}