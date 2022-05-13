<?php

/*
 * Copyright(C) 2022, Base
 * Base Account:
 * Services - Validate
 *
 * Record of change:
 * DATE            Version             AUTHOR           DESCRIPTION
 * 2022-05-12       1.0                DucHT           First Implement
 */

namespace App\Services;

use App\Models\CustomerDB;
use App\Models\CustomerLogics;
use Core\Controller;

/**
 * Description of Validate
 *
 * @author PC
 */
class Validate extends Controller
{

    /**
     * 
     */
    public function checkEmailAction()
    {
        if (!isset($_GET["email"])) {
           return;
        }

        $logics = new CustomerLogics();
        $email = $_GET["email"];
        $res = $logics->searchEmail($email);

        if ($res !== null) {
            echo ' Email has been use!';
            return;
        }

        echo '';
    }

    /**
     * 
     * @return type
     */
    public function checkPhoneAction()
    {
        if (!isset($_GET["phone"]) || !isset($_GET["act"])) {
            return;
        }

        $logics = new CustomerLogics();
        $phone = $_GET["phone"];
        $res = $logics->searchPhone($phone);

        if ($res == null) {
            echo '';
            return;
        }

        if (($_GET["act"] == 'register') || ($_GET["act"] == 'update' && ($res->getEmail() != $logics->searchEmail($_SESSION["User"])->getEmail()))) {
            echo ' Phone has been use!';
            return;
        }
    }

    /**
     * 
     * @return type
     */
    public function checkPassAction()
    {
        if (!isset($_POST["pass"]) || !isset($_POST["new"]) || !isset($_POST["cf"]) || !isset($_SESSION['User']) || !isset($_POST["force_logout"])) {
            return;
        }
        $logics = new CustomerLogics();
        $pass = $_POST["pass"];
        $acc = $logics->searchEmail($_SESSION['User']);

        if (!password_verify($pass, $acc->getPassword())) {
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

    /**
     * 
     */
    public function checkLoginAction()
    {
        if (!isset($_GET['lemail']) || !isset($_GET['lpassword'])) {
            return;
        }

        $data = new CustomerDB();
        $acc = $data->search('email', $_GET['lemail']);

        if ($acc->getCustomerId() == null) {
            echo ' Email is not registered!';
            return;
        }

        if (!password_verify($_GET['lpassword'], $acc->getPassword())) {
            echo ' Password is not correct!';
            return;
        }

        echo '';
    }
}
