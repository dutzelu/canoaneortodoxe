<?php

$dbServerName = 'localhost';
$dbUser = 'root';
$dbPassword = '';
$dbName = 'canoaneortodoxe';
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect($dbServerName, $dbUser, $dbPassword, $dbName);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>