<?php


$dbServerName = 'localhost';
$dbUser = 'root';
$dbPassword = '';
$dbName = 'canoaneortodoxe';

$conn = mysqli_connect ($dbServerName, $dbUser, $dbPassword, $dbName);
mysqli_set_charset($conn, "utf8");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$conn->set_charset("utf8");

define( "BASE_URL", "http://localhost/canoane/");
define("ROOT_PATH", $_SERVER["DOCUMENT_ROOT"] . "/canoane");


// Start the session
session_start();

?>