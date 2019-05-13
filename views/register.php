<?php
require_once "../models/config.php";
require_once "../models/user.php";

// Store errors in here
$errors = array();

// Adds a user to the database
function addUser($email, $password, $fname, $lname, $phone, $birthday)
{
    // Get the connection to the db
    $con = getConnection();
    // Clean/convert data for database injection
    $email = trim($email);
    //$password_hashed = sha1($password);
    $password_hashed = $password;
    // Prepare query
    $sql = "INSERT INTO accounts (id, email, password, fname, lname, phone, birthday, gender) VALUES (DEFAULT, '$email','$password', '$fname', '$lname', '$phone', '$birthday', 'male')";
    // Insert into database
    mysqli_query($con, $sql);
}
// REGISTER VALIDATION
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Okay, so user has input some text for both fields
    $username = $_POST['email'];
    $password = $_POST['password'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $birthday = $_POST['birthday'];
    $phone = $_POST['phone'];

    // Validate username
    if ($username == '') {
        array_push($errors, 'The username must not be empty');
    } elseif($username == 'hello@gmail.com') {
        array_push($errors, 'Invalid username');
    }
    // Validate password
    if ($password == '') {
        array_push($errors, 'The username must not be empty');
    }
    // Validate first name
    if ($fname == '') {
        array_push($errors, 'Please enter your first name');
    } elseif($fname == 'bob') {
        array_push($errors, 'Invalid first name');
    }
    // Validate last name
    if ($lname == '') {
        array_push($errors, 'The username must not be empty');
    }
    // Validate school
    if ($birthday == '') {
        array_push($errors, 'The username must not be empty');
    }
    // Validate major
    if ($phone == '') {
        array_push($errors, 'The username must not be empty');
    }
    // Check if there are any errors
    if (empty($errors)) {

        // No errors, register the user into the database
        addUser($username, $password, $fname, $lname, $phone, $birthday);
        echo 'Registration successful.';

        // Start a session
        session_start();
        // Store current username in session variable
        $_SESSION['username'] = $username;

        // Direct newly registered user to their profile page
        header("Location: profile.php");

    } else {
        // Display errors
        // We need to make this look nicer
        foreach($errors as $error) {
            echo $error, '<br>';
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div id="background"></div>

<section id="content">
    <div class="card-wrapper" id="register">
        <section id="register-card-left">
            <h3 id="right-header">Hello, Neighbor!</h3>
            <h5 id="right-subText">Already have an account? Head over to the sign in page.</h5>
            <a id="button-signup" href="login.php">SIGN IN</a>
        </section>

        <section id="register-card-right">
            <div id="logo"></div>
            <h3 id="card-header">Sign Up For An Account</h3>
            <h5 id="card-subHeader">It's free!</h5>

            <form method="post" action="" id="login-form">
                <div class="inputItem-wrapper">
                    <div class="input-textField-image" id="email"></div>
                    <input class="input-textField" name="email" type="email" placeholder="Email" required>
                </div>

                <div class="inputItem-wrapper">
                    <div class="input-textField-image" id="password"></div>
                    <input class="input-textField" name="password" type="password" placeholder="Password" required>
                </div>

                <div class="inputItem-wrapper">
                    <div class="input-textField-image" id="name-first"></div>
                    <input class="input-textField" name="fname" type="text" placeholder="First Name" pattern="^[^0-9]+$" required>
                </div>

                <div class="inputItem-wrapper">
                    <div class="input-textField-image" id="name-last"></div>
                    <input class="input-textField" name="lname" type="text" placeholder="Last Name" pattern="^[^0-9]+$" required>
                </div>

                <div class="inputItem-wrapper">
                    <div class="input-textField-image" id="school"></div>
                    <input class="input-textField" name="phone" type="tel" placeholder="Phone Number" required>
                </div>

                <div class="inputItem-wrapper">
                    <div class="input-textField-image" id="major"></div>
                    <input class="input-textField" name="birthday" type="date" placeholder="Birthday" required>
                </div>
                <input type="submit" value="SIGN UP" id="input-submit">

            </form>

        </section><!-- end card-left -->

    </div><!-- end card-wrapper -->

</section><!-- end content-->
</body>
</html>
