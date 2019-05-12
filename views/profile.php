<?php
// Initialize the connection to the server
require_once '../models/config.php';
require_once '../models/user.php';
?>

<!DOCTYPE html>
<head>
    <meta charset="utf-8"/>
    <title>Brick City</title>
    <link rel="stylesheet" type="text/css" href="css/main.css" />
    <link rel="stylesheet" type="text/css" href="css/taskboard.css" />
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/todo.js"></script>

</head>

<body>
<div id="main-container">
    <h1 id="page-header">Task Board</h1>
    <section class="board" id="inProgress">
        <h2 class="board-header" id="todo">In Progress</h2>

    </section>

    <section class="board" id="done">
        <h2 class="board-header" id="todo">Done</h2>

        <?php echo getTasks("1"); ?>

    </section>
</div>

</body>
</html>