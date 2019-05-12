<?php
// Checks if the given user exists in table

require_once "../models/config.php";

function user_exists($email) {
    $email = mysqli_real_escape_string($email);
    // Insert mysqli query here and test number of rows
    $total = mysqli_query($con, "SELECT COUNT {'id'} FROM 'accounts' WHERE 'email' == '{$email}'");
    return (mysqli_result($total, 0) == '1') ? true : false;
}

// Checks if the user credentials are valid
function valid_credentials($email, $password, $con) {
    $email = mysqli_real_escape_string($con, $email);
    $password = sha1($password);

    // FInd this username / password combination

    $query = "SELECT * FROM `accounts` WHERE email='$email' AND password='$password'";
    $results = mysqli_query($con, $query);

    // Returns TRUE if username/password are valid, FALSE otherwise
    return (mysqli_num_rows($results) == 1);
}
