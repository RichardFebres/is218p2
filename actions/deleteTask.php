<?php
require_once '../models/config.php';

// Get task ID
$taskID = $_POST['taskID'];

// Delete this item from the database
mysqli_query(getConnection(), "DELETE FROM todos WHERE id='$taskID'");
?>