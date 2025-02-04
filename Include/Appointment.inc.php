<?php
if(isset($_POST["appsubmit"])){
    $patiantName =$_POST ["name"];
    $patiantAge =$_POST ["age"];
    $patiantPhone =$_POST ["phone"];
    $patiantEmail =$_POST ["email"];
    $DocName =$_POST ["doctor"];
    $AppBranch = $_POST ["branch"];
    $patiantDate =$_POST ["date"];


    require_once 'dbh.inc.php';
    require_once 'function.inc.php';

    if (emptyInputs($patiantName,$patiantAge,$patiantPhone,$patiantEmail,$DocName,$AppBranch,$patiantDate) !== false) {
        exit();
    }
    createUser($conn,$patiantName,$patiantAge,$patiantPhone,$patiantEmail,$DocName,$AppBranch,$patiantDate);
}
else{
    header("location:../Appointment.php");
};