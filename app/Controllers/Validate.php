<?php

/*
 * Copyright(C) 2022, Base
 * Base Account:
 * Controller - Validate
 *
 * Record of change:
 * DATE            Version             AUTHOR           DESCRIPTION
 * 2022-005-06      1.0                DucHT           First Implement
 */

namespace App\Controllers;

use App\Models\CustomerLogics;
use Core\Controller;

/**
 * Description of Validate
 *
 * @author PC
 */
class Validate extends Controller
{
    public function checkEmailAction()
    {
        if (isset($_GET["email"])) {
            $logics = new CustomerLogics();
            $email = $_GET["email"];
            $res = $logics->searchEmail($email);
            if ($res !== null) {
                echo ' Email has been use!';
            } else {
                echo '';
            }
        }
    }
    public function checkPhoneAction()
    {
        if (isset($_GET["phone"]) && isset($_GET["act"])) {
            $logics = new CustomerLogics();
            $phone = $_GET["phone"];
            $res = $logics->searchPhone($phone);
            if (session_id() === '') {
                session_start();
            }
            if ($res == null) {
                echo '';
                return;
            }
            if (($_GET["act"] == 'register')||($_GET["act"] == 'update' && ($res->getEmail() != $logics->searchEmail($_SESSION["User"])->getEmail()))) {
                echo ' Phone has been use!';
                return;
            }
        }
    }
    public function checkPassAction()
    {
        if (session_id() === '') {
            session_start();
        }
        if (isset($_POST["pass"]) && isset($_POST["new"]) && isset($_POST["cf"]) && isset($_SESSION['User']) && isset($_POST["force_logout"])) {
            $logics = new CustomerLogics();
            $pass = $_POST["pass"];
            if (!$logics->checkPass($_SESSION['User'], $pass)) {
                echo -2;
                return;
            }
            $pattern = '/^[a-zA-Z0-9!@#$%^&*]{6,16}$/';
            if (!preg_match($pattern, $_POST["new"])) {
                echo -1;
                return;
            }
            if ($_POST["new"] !== $_POST["cf"]) {
                echo 0;
                return;
            };
            $logics->update($_SESSION['User'], array('password' => password_hash($_POST["new"], PASSWORD_DEFAULT)));
            if ($_POST["force_logout"] == '1') {
                unset($_SESSION['User']);
                setcookie("User", "", time() - 60, "/", "", 0);
            }
            echo 1;
        }
    }
}
