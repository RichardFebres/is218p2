<?php
// Initialize the connection to the server
require_once '../models/config.php';
require_once '../models/user.php';

// Start session
session_start();
//echo 'hello your email is'.$_SESSION['username'];

// Get todo items for this user
$username = $_SESSION['username'];
$taskID = $_SESSION['editTask'];

//echo 'task id '.$taskID;
?>

<!DOCTYPE html>
<head>
    <meta charset="utf-8"/>
    <title>Brick City</title>
    <link rel="stylesheet" type="text/css" href="../css/main.css" />
    <link rel="stylesheet" type="text/css" href="../css/taskboard.css" />
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/todo.js"></script>

</head>

<body>
<div id="main-container">
    <h1 id="page-header">Task Board</h1>
    <h3 id="welcomeBack">Welcome back, <?php
        $query_2 = "SELECT fname, lname FROM accounts WHERE email='$username'";
        $result_2 = mysqli_query(getConnection(), $query_2);
        while ($row = mysqli_fetch_array($result_2))
        {
            echo $row['fname']." ".$row['lname'];
        }

        ?>
    </h3>
    <div class="signout"><a href="../actions/signOut.php">Sign Out</a href=""></div>
    <form method="post">
        Title:<br>
        <input type="text" name="title" value="<?php getTask($taskID, 'title'); ?>"><br>
        Message:<br>
        <input type="text" name="message" value="<?php getTask($taskID, 'message'); ?>"><br>
        Due Date:<br>
        <input type="date" name="duedate" value="<?php getTask($taskID, 'duedate'); ?>"><br>
        Time:<br>
        <input type="time" name="time"><br>
        <button class="confirmEdit" onclick="<?php
        if (isset($_POST['title']) && isset($_POST['message']) && isset($_POST['duedate']) && isset($_POST['time']))
        {
            editTaskMessage($taskID, $_POST['title'], $_POST['message'], $_POST['duedate'], $_POST['time']);
            header('location: profile.php');
        }
        ?>">Confirm Edit</button>
    </form>
</div>

</body>
</html>