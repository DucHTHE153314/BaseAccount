<?php

require_once 'models/AccountDB.php';
require_once('models/Customer.php');
require_once 'models/Account.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (isset($_POST["lemail"]) && isset($_POST["lpassword"]) && isset($_POST["remember"])) {
    $phone = $_POST["lemail"];
    $password = $_POST["lpassword"];
    $remember = $_POST["remember"];
    $AccountDB = new AccountDB();
    $result = $AccountDB->checkAccount($phone,$password);
    if($result == 1){
        echo 'Login Success!';
    }else{
        echo 'error';
    }
    
//    header("Location: http://localhost/BaseAccount/?????????");
//    exit();
} else {
    echo 'Loi roi';
}
