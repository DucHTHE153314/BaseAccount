<?php

include '../models/CustomerDB.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (isset($_GET['email'])) {
    $email = $_GET['email'];
    $CustomerDB = new CustomerDB();
    echo $CustomerDB->searchEmail($email);
}
