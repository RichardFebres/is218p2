<?php
require_once '../models/config.php';

session_destroy();
$root = $_SERVER['DOCUMENT_ROOT'];
header('location: ../views/login.php ');

?>