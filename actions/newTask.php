<?php
require_once '../models/config.php';

// Get task ID
$message = $_POST['message'];
$duedate = $_POST['duedate'];

// Delete this item from the database
$query = "INSERT INTO todos (id, owneremail, ownerid, createddate, duedate, message, isdone) VALUES (default, 'testingemail@gmail.com', '85', 'date', 'duedate', '$message', '0')";
mysqli_query(getConnection(), $query);
?>