<?php
$serverName = "localhost";
$dbUserName = "CCHAdmin";
$dbPassword = "2snG@MhqBoguDXR5";
$dbName     = "cch_hospitals_db";

$conn = mysqli_connect($serverName, $dbUserName, $dbPassword, $dbName);

if (! $conn) {
    die("connection failed : " . mysqli_connct_error());
}