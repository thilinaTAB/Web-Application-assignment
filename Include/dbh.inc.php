<?php
$serverName = "localhost";
$dbUserName = "Admin";
$dbPassword = "qYGJo!2DoxJ9GxZv";
$dbName     = "care_compass_db";

$conn = mysqli_connect($serverName, $dbUserName, $dbPassword, $dbName);

if (! $conn) {
    die("connection failed : " . mysqli_connct_error());
}