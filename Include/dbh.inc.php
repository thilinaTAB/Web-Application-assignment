<?php
$serverName = "localhost";
$dbUserName = "cchAdmin";
$dbPassword = "eN6ZegvPffHV[2.Q";
$dbName     = "cch_hospitals_db";

$conn = mysqli_connect($serverName, $dbUserName, $dbPassword, $dbName);

if (! $conn) {
    die("connection failed : " . mysqli_connct_error());
}
