<?php
$serverName="localhost";
$dbUserName="cchAdmin";
$dbPassword=")MJy1*e8FLdQd_P-";
$dbName="cch_db";

$conn = mysqli_connect($serverName,$dbUserName,$dbPassword,$dbName);

if(!$conn){
    die("connection failed : " .mysqli_connct_error());
}
