<?php

// Function to check if signup fields are empty
function emptyInputSignup($username, $email, $userid, $password, $repassword) {
    return empty($username) || empty($email) || empty($userid) || empty($password) || empty($repassword);
}

// Function to validate username (only letters and numbers allowed)
function invalidUid($userid) {
    return !preg_match("/^[a-zA-Z0-9]*$/", $userid);
}

// Function to validate email format
function invalidEmail($email) {
    return !filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Function to check if passwords match
function pwdMatch($password, $repassword) {
    return $password !== $repassword;
}

// Function to check if the user already exists
function uidExists($conn, $userid, $email) {
    $sql = "SELECT * FROM Users WHERE Uuserid = ? OR Uemail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location:../Signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $userid, $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    $resultCheck = mysqli_stmt_num_rows($stmt);
    if ($resultCheck > 0) {
        return true;
    } else {
        return false;
    }
}

// Function to create a new user
function createNewUser($conn, $username, $email, $userid, $password) {
    $sql = "INSERT INTO users (Uname, Uemail, Uuserid, Upassword) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location:../Signup.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ssss", $username, $email, $userid, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location:../Signup.php?error=none");
    exit();
}

// Function to check if login fields are empty
function emptyInputLogin($username, $password) {
    return empty($username) || empty($password);
}

// Function to log in a user
function loginUser($conn, $username, $password) {
    $sql = "SELECT * FROM users WHERE Uuserid = ? OR Uemail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location:../Login.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        $pwdCheck = password_verify($password, $row['Upassword']);
        if ($pwdCheck === false) {
            header("location:../Login.php?error=wrongpassword");
            exit();
        } else {
            session_start();
            $_SESSION["userid"] = $row["Uuserid"];
            $_SESSION["username"] = $row["Uname"];
            header("location:../index.php");
            exit();
        }
    } else {
        header("location:../Login.php?error=usernotfound");
        exit();
    }
}

/*APPOINTMENT DATA*/
function emptyInputs($patiantName, $patiantAge, $patiantPhone, $patiantEmail, $DocName, $AppBranch, $patiantDate) {
    $result;
    if (empty($patiantName) || empty($patiantAge) || empty($patiantPhone) || empty($patiantEmail) || 
        empty($DocName) || empty($AppBranch) || empty($patiantDate)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function createUser($conn, $patiantName, $patiantAge, $patiantPhone, $patiantEmail, $DocName, $AppBranch, $patiantDate) {
    $sql = "INSERT INTO patients (PatientName, PatientAge, PatientPhone, PatientEmail, DoctorName, AppBranch, AppDate) 
            VALUES (?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location:../Appointment.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "siissss", $patiantName, $patiantAge, $patiantPhone, $patiantEmail, $DocName, $AppBranch, $patiantDate);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../Appointment.php?error=none");
    exit();
}

