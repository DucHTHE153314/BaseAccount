<?php

namespace App\Controllers;

/*
 * Copyright(C) 2022, Base
 * Base Account:
 * Controller - Account
 *
 * Record of change:
 * DATE            Version             AUTHOR           DESCRIPTION
 * 2022-05-05       1.1                DucHT           Implement Session, Cookie
 */

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
     * 
     * @return void
     */
    public function loginAction()
    {
        $logics = new CustomerLogics();
        if (isset($_COOKIE["User"]) && $logics->search("email", $_COOKIE["User"])) {
            View::render('infor.php');
            return;
        }
        if (session_id() === '') {
            session_start();
        }
        if (isset($_SESSION['User']) && $logics->search("email", $_SESSION['User'])) {
            View::render('infor.php');
            return;
        }
        if (isset($_POST["lemail"]) && isset($_POST["lpassword"])) {
            $email = $_POST["lemail"];
            $pass = $_POST["lpassword"];
            $remember =  isset($_POST["lremember"]) ? $_POST["lremember"] : 0;
            $result = $logics->login($email, $pass, $remember);
            if ($result === 1) {
                View::render('infor.php');
            } elseif ($result === 0) {
                View::render('login.php');
                echo "<script>
                $('#message').html('Mật Khẩu chưa chính xác');
                $('#myModal').show();
                </script>";
            } else {
                View::render('login.php');
                echo "<script>
                $('#message').html('Email chưa được đăng ký!');
                $('#myModal').show();
                </script>";
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
        if (isset($_COOKIE["User"])) {
            View::render('infor.php');
            return;
        }
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

    public function recoveryAction()
    {
        if (isset($_POST["remail"])) {
            $email = $_POST['remail'];
            $Logics = new CustomerLogics();
            $result = $Logics->searchEmail($email);
            if ($result) {
                echo 'Email exist!';
            } else {
                View::render('recovery.php');
                echo "<script>
                $('#myModal').show();
                </script>";
            }
        } else {
            View::render('recovery.php');
        }
    }
    public function inforAction()
    {
        if (!isset($_COOKIE["User"]) && !isset($_SESSION["User"])) {
            View::render('login.php');
            return;
        }
        View::render('infor.php');
    }
    public function logoutAction()
    {
        if (session_id() === '') {
            session_start();
        }
        unset($_SESSION["User"]);
        setcookie("User", "", time() - 60, "/", "", 0);
        View::render('index.html');
    }
}
