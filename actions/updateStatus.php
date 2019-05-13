<?php
require_once '../models/config.php';

// Get task ID
$taskID = $_POST['taskID'];
$isdone = $_POST['isdone'];

// Delete this item from the database
$query = "UPDATE todos SET isdone='$isdone' WHERE id='$taskID'";
mysqli_query(getConnection(), $query);
?>