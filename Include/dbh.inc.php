<?php
$serverName="localhost";
$dbUserName="cchAdmin";
$dbPassword="0FBgb)8gM2D!eXiD";
$dbName="cch_db";

$conn = mysqli_connect($serverName,$dbUserName,$dbPassword,$dbName);

if(!$conn){
    die("connection failed : " .mysqli_connct_error());
}
