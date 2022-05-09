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
use DateTime;

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
            $cus = $logics->search('email', $_COOKIE["User"]);
            View::render('infor.php', array('cus' => $cus));
            return;
        }
        if (session_id() === '') {
            session_start();
        }
        if (isset($_SESSION['User']) && $logics->search("email", $_SESSION['User'])) {
            $cus = $logics->search('email', $_SESSION["User"]);
            View::render('infor.php', array('cus' => $cus));
            return;
        }
        if (isset($_POST["lemail"]) && isset($_POST["lpassword"])) {
            $email = $_POST["lemail"];
            $pass = $_POST["lpassword"];
            $remember =  isset($_POST["lremember"]) ? $_POST["lremember"] : 0;
            $result =  $logics->login($email, $pass, $remember);
            if ($result === 1) {
                $cus = $logics->search('email', $email);
                View::render('infor.php', array('cus' => $cus));
            }
            echo $result;
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
            $cus = $Logics->register($first_name, $last_name, $phone, $email, $password);
            View::render('infor.php', array('cus' => $cus));
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
        $logics = new CustomerLogics();
        if (isset($_COOKIE["User"]) && $logics->search("email", $_COOKIE["User"])) {
            $cus = $logics->search('email', $_COOKIE["User"]);
            View::render('infor.php', array('cus' => $cus));
            return;
        }
        if (session_id() === '') {
            session_start();
        }
        if (isset($_SESSION['User']) && $logics->search("email", $_SESSION['User'])) {
            $cus = $logics->search('email', $_SESSION["User"]);
            View::render('infor.php', array('cus' => $cus));
            return;
        }
        View::render('login.php');
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
    public function updateAction()
    {
        $logics = new CustomerLogics();
        if (session_id() === '') {
            session_start();
        }
        if (!isset($_SESSION['User']) || !$logics->search("email", $_SESSION['User'])) {
            View::render('login.php');
            return;
        }
        if (isset($_POST["first_name"]) && isset($_POST["last_name"]) && isset($_POST["position"]) && isset($_POST["dob"]) && isset($_POST["phone"]) && isset($_POST["address"])) {
            $params = array(
                'first_name' => $_POST["first_name"],
                'last_name' => $_POST["last_name"],
                'position' => $_POST["position"],
                'birth_date' => DateTime::createFromFormat("Y-m-d", $_POST["dob"])->format('Y-m-d'),
                'phone' => $_POST["phone"],
                'address' => $_POST["address"]
            );
            if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_FILES["avatar"])) {
                $target_dir = "/BaseAccount/public/asset/images/";
                $target_file = $target_dir . basename($_FILES['avatar']['name']);
                $type_file = pathinfo($_FILES['fileUpload']['name'], PATHINFO_EXTENSION);
                $type_fileAllow = array('png', 'jpg', 'jpeg', 'gif');
                if (!in_array(strtolower($type_file), $type_fileAllow)) {
                    $error['fileUpload'] = "File bạn vừa chọn hệ thống không hỗ trợ, bạn vui lòng chọn hình ảnh";
                }
                $uploaddir = '/BaseAccount/public/asset/images/' . $_SESSION['User'] . 'jpg';
                move_uploaded_file($_FILES['avatar']['tmp_name'], $uploaddir);
                $params['avatar'] = $_SESSION['User'] . 'jpg';
            }
            $logics->update($_SESSION['User'], $params);
            return;
        }
        $cus = $logics->search('email', $_SESSION["User"]);
        View::render('infor.php', array('cus' => $cus));
        return;
    }
}
