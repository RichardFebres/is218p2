<?php

session_start();

$id = session_id();

$_SESSION = array();

session_destroy();

print "<br> Good Bye";
?>
