<?php
//patients sign up
// Function to check if signup fields are empty
function emptyInputSignup($username, $email, $userid, $password, $repassword)
{
    return empty($username) || empty($email) || empty($userid) || empty($password) || empty($repassword);
}

// Function to validate username (only letters and numbers allowed)
function invalidUid($userid)
{
    return ! preg_match("/^[a-zA-Z0-9]*$/", $userid);
}

// Function to validate email format
function invalidEmail($email)
{
    return ! filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Function to check if passwords match
function pwdMatch($password, $repassword)
{
    return $password !== $repassword;
}

// Function to check if the user already exists
function uidExists($conn, $userid, $email)
{
    $sql  = "SELECT * FROM users WHERE Uuserid = ? OR Uemail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (! mysqli_stmt_prepare($stmt, $sql)) {
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
function createNewUser($conn, $username, $email, $userid, $password)
{
    $sql  = "INSERT INTO users (Uname, Uemail, Uuserid, Upassword) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (! mysqli_stmt_prepare($stmt, $sql)) {
        header("location:../Signup.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ssss", $username, $email, $userid, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    echo '<script>
    alert("Account Created Successfully. Please Login");
    window.location.href = "../Login.php?error=notloggedin";
  </script>';
    exit();
}

// Function to check if login fields are empty
function emptyInputLogin($username, $password)
{
    return empty($username) || empty($password);
}

// Function to log in a user
function loginUser($conn, $username, $password)
{
    $sql  = "SELECT * FROM users WHERE Uuserid = ? OR Uemail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (! mysqli_stmt_prepare($stmt, $sql)) {
        echo '<script>
        alert("Database error. Please try again.");
        window.location.href = "../Login.php?error=dberror";
        </script>';
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        if (! password_verify($password, $row['Upassword'])) {
            echo '<script>
            alert("Incorrect password. Please try again.");
            window.location.href = "../Login.php?error=notloggedin";
            </script>';
            exit();
        } else {
            session_start();
            $_SESSION["userid"]   = $row["Uuserid"];
            $_SESSION["username"] = $row["Uname"];
            header("location:../index.php");
            exit();
        }
    } else {
        echo '<script>
            alert("User not found. Please check your username or email.");
            window.location.href = "../Login.php?error=notloggedin";
          </script>';
        exit();
    }
}

//APPOINTMENT DATA
function emptyInputs($patiantName, $patiantAge, $patiantPhone, $patiantEmail, $DocName, $AppBranch, $patiantDate)
{
    $result;
    if (empty($patiantName) || empty($patiantAge) || empty($patiantPhone) || empty($patiantEmail) ||
        empty($DocName) || empty($AppBranch) || empty($patiantDate)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function createUser($conn, $patiantName, $patiantAge, $patiantPhone, $patiantEmail, $DocName, $AppBranch, $patiantDate)
{
    $sql = "INSERT INTO patients (PatientName, PatientAge, PatientPhone, PatientEmail, DoctorName, AppBranch, AppDate)
            VALUES (?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (! mysqli_stmt_prepare($stmt, $sql)) {
        header("location:../Appointment.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "siissss", $patiantName, $patiantAge, $patiantPhone, $patiantEmail, $DocName, $AppBranch, $patiantDate);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../Appointment.php?error=none");
    exit();
}

//Staff sign up
// Function to check if signup fields are empty
function emptyStaffSignup($sName, $sNIC, $sContact, $staffId, $staffMail, $sRole, $sPassword, $sRepassword)
{
    return empty($sName) || empty($sNIC) || empty($sContact) || empty($staffId) || empty($staffMail)
    || empty($sRole) || empty($sPassword) || empty($sRepassword);
}

// Function to validate username (only letters and numbers allowed)
function invalidSid($staffId)
{
    return ! preg_match("/^[a-zA-Z0-9]*$/", $staffId);
}

// Function to validate email format
function invalidsMmail($staffMail)
{
    return ! filter_var($staffMail, FILTER_VALIDATE_EMAIL);
}

// Function to check if passwords match
function spwdMatch($sPassword, $sRepassword)
{
    return $sPassword !== $sRepassword;
}

// Function to check if the user already exists
function sidExists($conn, $staffId, $staffMail)
{
    $sql  = "SELECT * FROM staff WHERE staffId = ? OR staffMail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (! mysqli_stmt_prepare($stmt, $sql)) {
        header("location:../Admin\Staff.Signup.php?error=stmtfailed1");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $staffId, $staffMail);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    $resultCheck = mysqli_stmt_num_rows($stmt);
    if ($resultCheck > 0) {
        return true;
    } else {
        return false;
    }
}

// Function to create a new Staff
function createNewStaff($conn, $sName, $sNIC, $sContact, $staffId, $staffMail, $sRole, $sPassword)
{
    $sql  = "INSERT INTO staff (sName, sNIC, sContact, staffId, sRole, staffMail, sPassword) VALUES (?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (! mysqli_stmt_prepare($stmt, $sql)) {
        header("location:../Admin\Staff.Signup.php?error=stmtfailed2");
        exit();
    }

    $hashedsPwd = password_hash($sPassword, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ssissss", $sName, $sNIC, $sContact, $staffId, $staffMail, $sRole, $hashedsPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    echo '<script>
    alert("Account Created Successfully. Please Login");
    window.location.href = "../Admin\StaffDash.php?error=none";
  </script>';
    exit();
}

//STAFF LOGIN

// Function to check if login fields are empty
function emptyInputsLogin($staffId, $sPassword)
{
    return empty($staffId) || empty($sPassword);
}

// Function to log in staff
function isStaff($conn, $username)
{
    $sql  = "SELECT * FROM staff WHERE staffId = ? OR staffMail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (! mysqli_stmt_prepare($stmt, $sql)) {
        return false;
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    return mysqli_fetch_assoc($result) ? true : false;
}

function loginStaff($conn, $staffId, $sPassword)
{
    $sql  = "SELECT * FROM staff WHERE staffId = ? OR staffMail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (! mysqli_stmt_prepare($stmt, $sql)) {
        echo '<script>
        alert("Database error. Please try again.");
        window.location.href = "../Login.php?error=dberror";
        </script>';
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $staffId, $staffId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        if (! password_verify($sPassword, $row['sPassword'])) {
            echo '<script>
            alert("Incorrect staff password. Please try again.");
            window.location.href = "../Login.php?error=staffnotloggedin";
            </script>';
            exit();
        } else {
            session_start();
            $_SESSION["staff"]     = true;
            $_SESSION["staffid"]   = $row["staffId"];
            $_SESSION["staffname"] = $row["sName"];
            header("location:../Admin\StaffDash.php");
            exit();
        }
    } else {
        echo '<script>
            alert("Staff account not found. Please check your username or email.");
            window.location.href = "../Login.php?error=staffnotloggedin";
          </script>';
        exit();
    }
}
