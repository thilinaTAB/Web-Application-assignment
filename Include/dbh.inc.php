<?php
$serverName = "localhost";
$dbUserName = "cchAdmin";
$dbPassword = "HBrA9d/zKxF4agZD";
$dbName     = "cch_hospitals_db";

$conn = mysqli_connect($serverName, $dbUserName, $dbPassword, $dbName);

if (! $conn) {
    die("connection failed : " . mysqli_connct_error());
}