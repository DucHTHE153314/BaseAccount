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
                echo '';
            } else {
                echo ' Email has been use!';
            }
        }
    }
    public function checkPhoneAction()
    {
        if (isset($_GET["phone"])) {
            $logics = new CustomerLogics();
            $phone = $_GET["phone"];
            $res = $logics->searchPhone($phone);
            if ($res !== null) {
                echo ' Phone has been use!';
            } else {
                echo '';
            }
        }
    }
    public function checkPassAction()
    {
        if (session_id() === '') {
            session_start();
        }
        if (isset($_GET["pass"]) && isset($_GET["new"]) && isset($_GET["cf"]) && isset($_SESSION['User'])) {
            $logics = new CustomerLogics();
            $pass = $_GET["pass"];
            if (!$logics->checkPass($_SESSION['User'], $pass)) {
                echo -2;
                return;
            }
            $pattern = '/^[a-zA-Z0-9!@#$%^&*]{6,16}$/';
            if (!preg_match($pattern, $_GET["new"])) {
                echo -1;
                return;
            }
            if ($_GET["new"] !== $_GET["cf"]) {
                echo 0;
                return;
            };
            $logics->update($_SESSION['User'], array('password' => password_hash($_GET["new"], PASSWORD_DEFAULT)));
            echo 1;
        }
    }
}
