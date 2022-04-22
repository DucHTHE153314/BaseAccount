<?php

require_once('models/Customer.php');
require_once('models/Account.php');
require_once('models/CustomerDB.php');
require_once('models/RoleDB.php');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (isset($_POST["fullname"]) && isset($_POST["email"]) && isset($_POST["phone"]) && isset($_POST["password"])) {
    $full_name = $_POST["fullname"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];
    $password = password_hash($password, PASSWORD_BCRYPT);
    $cus = new Customer(0, $full_name, 1, NULL, $phone, $email, ' ');
    $RoleDB = new RoleDB();
    $acc = new Account($email, $password, $RoleDB->getOne(2));
    $CustomerDB = new CustomerDB();
    $CustomerDB->register($cus, $acc);
    echo 'Register Success!';
//    header("Location: http://localhost/BaseAccount/?????????");
//    exit();
} else {
    echo 'Loi roi';
}
