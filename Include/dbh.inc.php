<?php
$serverName="localhost";
$dbUserName="Admin01";
$dbPassword="Mdltd)ZZNw2aM@Wp";
$dbName="appointment_data";

$conn = mysqli_connect($serverName,$dbUserName,$dbPassword,$dbName);

if(!$conn){
    die("connection failed : " .mysqli_connct_error());
}
