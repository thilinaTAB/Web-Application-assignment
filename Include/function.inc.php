<?php

// -------------------------------- ACCOUNT CREATE FUNCTIONS --------------------------------//

// $$$ CREATE VISITORS ACCOUNTS $$$ //

// Check if signup fields are empty
function emptyInputSignup($username, $email, $userid, $password, $repassword)
{
    return empty($username) || empty($email) || empty($userid) || empty($password) || empty($repassword);
}

// Validate user identifier (only letters and numbers allowed)
function invalidUid($userid)
{
    return ! preg_match("/^[a-zA-Z0-9]*$/", $userid);
}

// Validate email format
function invalidEmail($email)
{
    return ! filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Check if passwords match
function pwdMatch($password, $repassword)
{
    return $password !== $repassword;
}

// Check if the user already exists (by user_identifier or email)
function uidExists($conn, $userid, $email)
{
    $sql  = "SELECT * FROM users WHERE user_identifier = ? OR email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (! mysqli_stmt_prepare($stmt, $sql)) {
        header("location:../Signup.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $userid, $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    $resultCheck = mysqli_stmt_num_rows($stmt);
    mysqli_stmt_close($stmt);
    return $resultCheck > 0;
}

function createNewUser($conn, $username, $email, $userid, $password)
{
    $sql  = "INSERT INTO users (username, email, user_identifier, password) VALUES (?, ?, ?, ?);";
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

// $$$ CREATE STAFF ACCOUNTS $$$ //

// Check if staff signup fields are empty
function emptyStaffSignup($sName, $sNIC, $sContact, $staffId, $staffMail, $sRole, $sPassword, $sRepassword)
{
    return empty($sName) || empty($sNIC) || empty($sContact) || empty($staffId) || empty($staffMail)
    || empty($sRole) || empty($sPassword) || empty($sRepassword);
}

// Validate staff identifier (only letters and numbers allowed)
function invalidSid($staffId)
{
    return ! preg_match("/^[a-zA-Z0-9]*$/", $staffId);
}

// Validate staff email format
function invalidsMmail($staffMail)
{
    return ! filter_var($staffMail, FILTER_VALIDATE_EMAIL);
}

// Check if staff passwords match
function spwdMatch($sPassword, $sRepassword)
{
    return $sPassword !== $sRepassword;
}

// Check if a staff account already exists (by staff_identifier or staff_email)
function sidExists($conn, $staffId, $staffMail)
{
    $sql  = "SELECT * FROM staff WHERE staff_identifier = ? OR staff_email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (! mysqli_stmt_prepare($stmt, $sql)) {
        header("location:../Admin/Staff.Signup.php?error=stmtfailed1");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $staffId, $staffMail);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    $resultCheck = mysqli_stmt_num_rows($stmt);
    mysqli_stmt_close($stmt);
    return $resultCheck > 0;
}

// Create a new staff account
function createNewStaff($conn, $sName, $sNIC, $sContact, $staffId, $staffMail, $sRole, $sPassword)
{
    $sql = "INSERT INTO staff (staff_name, staff_nic, staff_contact, staff_identifier, staff_role, staff_email, staff_password)
             VALUES (?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (! mysqli_stmt_prepare($stmt, $sql)) {
        header("location:../Admin/Staff.Signup.php?error=stmtfailed2");
        exit();
    }

    $hashedPwd = password_hash($sPassword, PASSWORD_DEFAULT);
    // Adjust binding types as needed. Here all fields are treated as strings.
    mysqli_stmt_bind_param($stmt, "sssssss", $sName, $sNIC, $sContact, $staffId, $sRole, $staffMail, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    echo '<script>
            alert("Account Created Successfully. Please Login");
            window.location.href = "../Admin/StaffDash.php?error=none";
          </script>';
    exit();
}

// -------------------------------- ACCOUNT LOGIN FUNCTIONS --------------------------------//

// $$$ LOGIN TO VISITORS ACCOUNTS $$$ //

// Check if login fields are empty
function emptyInputLogin($username, $password)
{
    return empty($username) || empty($password);
}

// Log in a user
function loginUser($conn, $username, $password)
{
    $sql  = "SELECT * FROM users WHERE user_identifier = ? OR email = ?;";
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
        if (! password_verify($password, $row['password'])) {
            echo '<script>
                    alert("Incorrect password. Please try again.");
                    window.location.href = "../Login.php?error=notloggedin";
                  </script>';
            exit();
        } else {
            session_start();
            // Storing the primary key (user_id) for future reference
            $_SESSION["userid"]   = $row["user_id"];
            $_SESSION["username"] = $row["username"];
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

// $$$ LOGIN TO VISITORS ACCOUNTS $$$ //

// Check if staff login fields are empty
function emptyInputsLogin($staffId, $sPassword)
{
    return empty($staffId) || empty($sPassword);
}

// Verify if a staff account exists (by staff_identifier or staff_email)
function isStaff($conn, $username)
{
    $sql  = "SELECT * FROM staff WHERE staff_identifier = ? OR staff_email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (! mysqli_stmt_prepare($stmt, $sql)) {
        return false;
    }
    mysqli_stmt_bind_param($stmt, "ss", $username, $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $exists = mysqli_fetch_assoc($result) ? true : false;
    mysqli_stmt_close($stmt);
    return $exists;
}

// Log in staff
function loginStaff($conn, $staffId, $sPassword)
{
    $sql  = "SELECT * FROM staff WHERE staff_identifier = ? OR staff_email = ?;";
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
        if (! password_verify($sPassword, $row['staff_password'])) {
            echo '<script>
                    alert("Incorrect staff password. Please try again.");
                    window.location.href = "../Login.php?error=staffnotloggedin";
                  </script>';
            exit();
        } else {
            session_start();
            $_SESSION["staff"]     = true;
            $_SESSION["staffid"]   = $row["staff_id"];
            $_SESSION["staffname"] = $row["staff_name"];
            header("location:../Admin/StaffDash.php");
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

// -------------------------------- APPOINTMENT FUNCTIONS --------------------------------//

// Check if appointment fields are empty
function emptyInputs($patientName, $patientAge, $patientPhone, $patientEmail, $doctorId, $appBranch, $patientDate)
{
    return empty($patientName) || empty($patientAge) || empty($patientPhone) || empty($patientEmail) ||
    empty($doctorId) || empty($appBranch) || empty($patientDate);
}

// Create a new appointment
function createAppointment($conn, $user_id, $patientName, $patientAge, $patientPhone, $patientEmail, $doctorId, $appBranch, $patientDate)
{
    $sql = "INSERT INTO patients (user_id, patient_name, patient_age, patient_phone, patient_email, doctor_id, appointment_branch, appointment_date)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (! mysqli_stmt_prepare($stmt, $sql)) {
        header("location:../Appointment.php?error=stmtfailed");
        exit();
    }
    // Bind parameters: user_id & doctor_id as integers; rest as strings (patient_age is an integer)
    mysqli_stmt_bind_param($stmt, "isississ", $user_id, $patientName, $patientAge, $patientPhone, $patientEmail, $doctorId, $appBranch, $patientDate);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../Appointment.php?error=none");
    exit();
}
