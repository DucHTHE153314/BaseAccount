<?php

/*
 * Copyright(C) 2022, Base
 * Base Account:
 * Model - class Connection
 *
 * Record of change:
 * DATE            Version             AUTHOR           DESCRIPTION
 * 2022-04-19       1.0                DucHT             First Implement
 */

/**
 * Description of Connection
 *
 * @author PC
 */
class Connection {

    //put your code here
    function __construct() {
        
    }

    function getConnection() {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "northwind";
        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        return $conn;
    }

    function closeConnection($conn) {
        mysqli_close($conn);
    }

}
