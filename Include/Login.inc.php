<?php
if(isset($_POST["submit"])){
    $username = $_POST("uname");
    $password = $_POST("password");

    require_once 'dbh.inc.php';
    require_once 'function.inc.php';

    if (emptyInputs($patiantName,$patiantAge,$patiantPhone,$patiantEmail,$DocName,$AppBranch,$patiantDate) !== false) {
        exit();
    }
    createUser($conn,$patiantName,$patiantAge,$patiantPhone,$patiantEmail,$DocName,$AppBranch,$patiantDate);
}
else{
    header("location:../Login.php");
};