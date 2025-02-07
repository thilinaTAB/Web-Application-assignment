<?php
$serverName="localhost";
$dbUserName="cchAdmin";
$dbPassword="Ec7lDe[nyD6da8CJ";
$dbName="cch_db";

$conn = mysqli_connect($serverName,$dbUserName,$dbPassword,$dbName);

if(!$conn){
    die("connection failed : " .mysqli_connct_error());
}
