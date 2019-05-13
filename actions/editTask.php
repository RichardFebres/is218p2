<?php
require_once '../models/config.php';

session_start();

// Get task ID
$_SESSION['editTask'] = $_POST['taskID'];

?>