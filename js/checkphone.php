<?php

include '../models/CustomerDB.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (isset($_REQUEST['email'])) {
    $phone = $_REQUEST['email'];
    $CustomerDB = new CustomerDB();
    echo "{$CustomerDB->searchPhone($phone)}";
}
