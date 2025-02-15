<?php
$serverName = "localhost";
$dbUserName = "cchAdmin";
$dbPassword = "DO4KAHUyd*UsO(nh";
$dbName     = "cch_hospitals_db";

$conn = mysqli_connect($serverName, $dbUserName, $dbPassword, $dbName);

if (! $conn) {
    die("connection failed : " . mysqli_connct_error());
}
