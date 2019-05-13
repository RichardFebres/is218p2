<?php

// This file defines the database credentials and connection
// Define the database information

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'is218p2');

/*
define('DB_SERVER', 'sql.njit.edu');
define('DB_USERNAME', 'rcc442');
define('DB_PASSWORD', 'mathieu76');
define('DB_NAME', 'rc442');
*/

// Connect to DB

$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
// Check if connection failed
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: ". mysqli_connect_error();
}

function getConnection() {
    static $con;
    if ($con===NULL){
        $con = mysqli_connect (DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    }
    return $con;
}

