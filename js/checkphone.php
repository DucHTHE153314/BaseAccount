<?php

include '../models/CustomerDB.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (isset($_GET['phone'])) {
    $phone = $_GET['phone'];
    $CustomerDB = new CustomerDB();
    echo "{$CustomerDB->searchPhone($phone)}";
}
