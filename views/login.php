<?php

// Initialize the connection to the server
require_once '../models/config.php';
require_once '../models/user.php';

// Define errors array for logging
$errors = array();
$con = getConnection();

// LOGIN
if (isset($_POST['username'], $_POST['password'])) {

    // Okay, so user has input some text for both fields

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Lets validate their input
    if (valid_credentials($username, $password, $con)) {

        // Credentials validated successfully
        // Start the session

        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";

        header('location: profile.php');

    } else {
        // User doesnt exist
        array_push($errors, "Wrong username/password combination");
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div id="background"></div>

<section id="content">

    <!-- Login -->
    <div class="card-wrapper animation-slideRight" id="login">
        <section id="login-card-left">
            <div id="logo"></div>
            <h3 id="card-header">Sign in to Stormify</h3>
            <section id="error-container">
                    <span class="error"><?php
                        if (!empty($errors)) {
                            foreach($errors as $error) {
                                echo $error;
                            }
                        }
                        ?></span>
            </section>

            <form method="post" action="" id="login-form">
                <div class="inputItem-wrapper">
                    <div class="input-textField-image" id="email"></div>
                    <input class="input-textField" name="username" type="email" placeholder="Email" required>
                </div>

                <div class="inputItem-wrapper">
                    <div class="input-textField-image" id="password"></div>
                    <input class="input-textField" name="password" type="password" placeholder="Password" required>
                </div>

                <input type="submit" value="SIGN IN" id="input-submit">

                <span id="forgotPassword">Forgot your password?</span>
            </form>

            <section id="user-social">
                <img src="../images/logo-facebook.png" class="social-icon" />
                <img src="../images/logo-google.png" class="social-icon" />
                <img src="../images/logo-linkedin.png" class="social-icon" />
            </section>

        </section><!-- end card-left -->

        <section id="login-card-right">
            <h3 id="right-header">Welcome Back!</h3>
            <h5 id="right-subText">Never been here before? Tell us a bit about yourself and you can begin.</h5>
            <a id="button-signup" href="register.php">SIGN UP</a>
        </section>

    </div><!-- end card-wrapper -->


</section><!-- end content-->

<!-- Javascript -->
<script src="scripts/animation.js"></script>
</body>
</html>
