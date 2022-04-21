<?php

include 'models/CustomerDB.php';
include 'models/Customer.php';
include 'models/Account.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (isset($_POST["fullname"]) && isset($_POST["email"]) && isset($_POST["phone"]) && isset($_POST["password"])) {
    $full_name = $_POST["fullname"];
    $email = $_POST["fullname"];
    $phone = $_POST["fullname"];
    $password = $_POST["fullname"];
    $password = password_hash($password, PASSWORD_BCRYPT);
    $cus = new Customer(0, $full_name, TRUE, NULL, $phone, $email, "");
    $acc = new Account($email, $password, 3);
    $CustomerDB = new CustomerDB();
    $CustomerDB->register($cus, $acc);
//    header("Location: http://localhost/BaseAccount/?????????");
//    exit();
} else {
    header("Location: http://localhost/BaseAccount/register.php");
    exit();
}

//function scrt($password) {
//    echo password_hash("rasmuslerdorf", PASSWORD_BCRYPT) . "\n";
//
//    $hash = '$2y$07$BCryptRequires22Chrcte/VlQH0piJtjXl.0t1XkA8pw9dMXTpOq';
//
//    if (password_verify('rasmuslerdorf', $hash)) {
//        echo 'Password is valid!';
//    } else {
//        echo 'Invalid password.';
//    }
//}
