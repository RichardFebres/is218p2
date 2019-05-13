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
$query = "SELECT createddate, duedate, message, isdone FROM todos WHERE owneremail='$username'";
$result = mysqli_query(getConnection(), $query);

?>

<!DOCTYPE html>
<head>
    <meta charset="utf-8"/>
    <title>Brick City</title>
    <link rel="stylesheet" type="text/css" href="../css/main.css" />
    <link rel="stylesheet" type="text/css" href="../css/taskboard.css" />
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/todo.js"></script>

</head>

<body>
<div id="main-container">
    <h1 id="page-header">Task Board</h1>
    <section class="board" id="inProgress">
        <h2 class="board-header" id="todo">In Progress</h2>
        <?php
        while ($row = mysqli_fetch_array($result))
        {
            if ($row['isdone'] == 0)
            {
                $img = ($row['isdone']) ? 'check.png' : 'flask.png';

                // Create card
                //echo $row['message'];
                echo '<div class="card-task" id="">';
                echo '<div class="card-top">';
                echo '<img class="card-img" src="../images/'.$img.'"/>';
                echo '<h3 class="card-header">'.$row['message'].'</h3>';
                echo '</div>';
                echo '<div class="card-middle">';
                echo '<h5 class="card-attribute">'.$row['createddate'].'</h5>';
                echo '</div>';
                echo '</div>';

                //Buttons
            }
        }
        ?>
    </section>

    <section class="board" id="done">
        <h2 class="board-header" id="todo">Done</h2>
        <?php
        while ($row = mysqli_fetch_array($result))
        {
            if ($row['isdone'] == 1)
            {
                $img = ($row['isdone']) ? 'check.png' : 'flask.png';

                // Create card
                //echo $row['message'];
                echo '<div class="card-task" id="">';
                echo '<div class="card-top">';
                echo '<img class="card-img" src="../images/'.$img.'"/>';
                echo '<h3 class="card-header">'.$row['message'].'</h3>';
                echo '</div>';
                echo '<div class="card-middle">';
                echo '<h5 class="card-attribute">'.$row['createddate'].'</h5>';
                echo '</div>';
                echo '</div>';

                //Buttons
            }
        }
        ?>

    </section>
</div>

</body>
</html>