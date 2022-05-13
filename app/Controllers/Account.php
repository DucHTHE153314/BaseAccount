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
     * Handling login action of customer. </br>
     * Redirect to default page in this app if success. Else, stay in login page.
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
        if (isset($_SESSION['User']) && $logics->search("email", $_SESSION['User'])) {
            $cus = $logics->search('email', $_SESSION["User"]);
            View::render('infor.php', array('cus' => $cus));
            return;
        }
        if (isset($_POST["lemail"])) {
            $email = $_POST["lemail"];
            var_dump($email);
            $remember = isset($_POST["lremember"]) ? 1 : 0;
            $cus = $logics->login($email, $remember);
            View::render('infor.php', array('cus' => $cus));
            return;
        }
        View::render('login.php');
    }

    /**
     * Handling register action of customer. </br>
     * Redirect to default page in this app if success. Else, stay in register page.
     * @return void
     */
    public function registerAction()
    {
        if (isset($_POST["first_name"]) && isset($_POST["last_name"]) && isset($_POST["register_email"]) && isset($_POST["register_phone"])) {
            $first_name = $_POST["first_name"];
            $last_name = $_POST["last_name"];
            $email = $_POST["register_email"];
            $phone = $_POST["register_phone"];
            $password = $_POST["register_password"];
            $Logics = new CustomerLogics();
            $Logics->register($first_name, $last_name, $phone, $email, $password);
        } else {
            View::render('register.php');
        }
    }

    /**
     * Handling recovery action of customer.  </br>
     * Redirect to default page in this app if success. Else, stay in recovery page.
     * @return void
     */
    public function recoveryAction()
    {
        if (!isset($_GET["remail"])) {
            View::render('recovery.php');
            return;
        }        
        $email = $_GET['remail'];
        $Logics = new CustomerLogics();
        echo $Logics->recovery($email);
    }

    /**
     * Accept an User has been login in the system do infor action.
     * @return type
     */
    public function inforAction()
    {
        $logics = new CustomerLogics();

        if (isset($_COOKIE["User"]) && $logics->search("email", $_COOKIE["User"])) {
            $cus = $logics->search('email', $_COOKIE["User"]);
            View::render('infor.php', array('cus' => $cus));
            return;
        }

        if (isset($_SESSION['User']) && $logics->search("email", $_SESSION['User'])) {
            $cus = $logics->search('email', $_SESSION["User"]);
            View::render('infor.php', array('cus' => $cus));
            return;
        }

        View::render('login.php');
    }

    /**
     * Help user log out System. Delete all Coockie, Session related to them.
     * @return void 
     */
    public function logoutAction()
    {
        unset($_SESSION["User"]);
        setcookie("User", "", time() - 60, "/", "", 0);
        View::render('index.html');
    }

    /**
     * Accept an User has been login in the system update his information.
     * @return type
     */
    public function updateAction()
    {
        $logics = new CustomerLogics();

        if (!isset($_SESSION['User']) || !$logics->search("email", $_SESSION['User'])) {
            View::render('login.php');
            return;
        }

        $cus = $logics->search("email", $_SESSION['User']);

        if (isset($_POST["first_name"]) && isset($_POST["last_name"]) && isset($_POST["position"]) && isset($_POST["dob"]) && isset($_POST["phone"]) && isset($_POST["address"])) {
            $params = [
                'first_name' => $_POST["first_name"],
                'last_name' => $_POST["last_name"],
                'position' => $_POST["position"],
                'birth_date' => DateTime::createFromFormat("Y-m-d", $_POST["dob"])->format('Y-m-d'),
                'phone' => $_POST["phone"],
                'address' => $_POST["address"]
            ];
            $logics->update($_SESSION['User'], $params);
            return;
        }

        if (isset($_FILES["avatar"]) && is_uploaded_file($_FILES['avatar']['tmp_name'])) {
            //The path you wish to upload the image to
            $imagePath = __DIR__ . '\/../../' . 'public/asset/images/';
            $save_path = $imagePath . "C" . $cus->getCustomerId() . "_avatar.png";

            if (file_exists($save_path)) {
                unlink($save_path);
            }

            if (move_uploaded_file($_FILES['avatar']['tmp_name'], $save_path)) {
                $params = [
                    'avatar' => "C" . $cus->getCustomerId() . "_avatar.png"
                ];
                $logics->update($_SESSION['User'], $params);
            }
        }
        $cus = $logics->search('email', $_SESSION["User"]);
        View::render('infor.php', array('cus' => $cus));
    }
}
