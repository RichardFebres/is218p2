<?php
// Initialize the connection to the server
require_once '../models/config.php';
require_once '../models/user.php';

// Start session
session_start();
//echo 'hello your email is'.$_SESSION['username'];

// Get todos
// Get todo items for this user
$username = $_SESSION['username'];
$query = "SELECT id, createddate, duedate, message, isdone FROM todos WHERE owneremail='$username'";
$result = mysqli_query(getConnection(), $query);

function testFunc($taskID)
{
    echo 'Deleting task id '.$taskID;
}

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
    <section class="board" id="inProgress">
        <h2 class="board-header" id="todo">In Progress</h2>
    </section>

    <section class="board" id="done">
        <h2 class="board-header" id="todo">Done</h2>

        <?php
        while ($row = mysqli_fetch_array($result))
        {
            echo '<script type="text/javascript">addTask("' . $row["id"] . '", "' . $row["message"] . '", "' . $row["isdone"] . '", "' . $row["createddate"] . '");</script>';
        }
        ?>

    </section>
</div>

</body>
</html>