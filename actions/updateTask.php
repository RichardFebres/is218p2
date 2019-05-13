<?php
require_once '../models/config.php';

// Get task ID
$taskID = $_POST['taskID'];
$message = $_POST['message'];

// Delete this item from the database
$query = "UPDATE todos SET message='$message' WHERE id='$taskID'";
mysqli_query(getConnection(), $query);

// Refresh page
//header('location: profile.php');
?>