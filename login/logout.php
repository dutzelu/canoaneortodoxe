<?php
require_once "../db.php";
 
// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();
 
// Redirect to login page
header("Location: " . BASE_URL . "index.php");
exit;
?>