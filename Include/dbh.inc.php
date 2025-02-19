<?php
$serverName = "localhost";
$dbUserName = "cchAdmin";
$dbPassword = "4YZja3JKE*kxH5Xm";
$dbName     = "cch_hospitals_db";

$conn = mysqli_connect($serverName, $dbUserName, $dbPassword, $dbName);

if (! $conn) {
    die("connection failed : " . mysqli_connct_error());
}
