<?php
$serverName="localhost";
$dbUserName="cchAdmin";
$dbPassword="43qNcXRXaDxcGCj@";
$dbName="cch_db";

$conn = mysqli_connect($serverName,$dbUserName,$dbPassword,$dbName);

if(!$conn){
    die("connection failed : " .mysqli_connct_error());
}
