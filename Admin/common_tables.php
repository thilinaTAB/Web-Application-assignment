<?php
// common_tables.php

// Function to display the doctors table
function displayDoctorsTable($conn, $allowDelete = false)
{
    echo "<h2 id='doctor-management'>" . ($allowDelete ? "Doctor Management" : "Doctor List") . "</h2>";
    echo "<p>Manage doctor records here.</p>";

    echo "<table class='table table-bordered'>";
    echo "<thead><tr><th>Doctor's Name</th><th>Specialization</th>";
    if ($allowDelete) {
        echo "<th>Action</th>";
    }
    echo "</tr></thead><tbody>";

    $sql    = "SELECT * FROM doctors ORDER BY doctor_name ASC";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>Dr. " . $row['doctor_name'] . "</td>";
            echo "<td>" . $row['doctor_specialty'] . "</td>";
            if ($allowDelete) {
                echo "<td><a href='?delete_id=" . $row['doctor_id'] . "' class='btn btn-danger btn-sm' onclick=\"return confirm('Are you sure you want to delete this doctor?');\">Delete</a></td>";
            }
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='" . ($allowDelete ? 3 : 2) . "'>No records found.</td></tr>";
    }

    echo "</tbody></table>";
}

// Function to display the appointments table
function displayAppointmentsTable($conn, $allowDelete = false)
{
    echo "<h2 id='patient-information'>Appointments Information</h2>";
    echo "<p>Manage patient records here.</p>";

    echo "<div class='table-responsive'>";
    echo "<table class='table table-bordered'>";
    echo "<thead><tr><th>Name</th><th>Age</th><th>Contact Number</th><th>Email</th><th>Doctor</th><th>Branch</th><th>Date</th><th>Time Added</th>";
    if ($allowDelete) {
        echo "<th>Action</th>";
    }
    echo "</tr></thead><tbody>";

    $sql    = "SELECT patients.*, doctors.doctor_name FROM patients JOIN doctors ON patients.doctor_id = doctors.doctor_id ORDER BY patients.appointment_date ASC";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['patient_name'] . "</td>";
            echo "<td>" . $row['patient_age'] . "</td>";
            echo "<td>" . $row['patient_phone'] . "</td>";
            echo "<td>" . $row['patient_email'] . "</td>";
            echo "<td>Dr. " . $row['doctor_name'] . "</td>";
            echo "<td>" . $row['appointment_branch'] . "</td>";
            echo "<td>" . $row['appointment_date'] . "</td>";
            echo "<td>" . $row['appointment_created'] . "</td>";
            if ($allowDelete) {
                echo "<td><a href='?delete_patient=" . $row['patient_id'] . "' class='btn btn-danger btn-sm' onclick=\"return confirm('Are you sure you want to delete this patient?');\">Delete</a></td>";
            }
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='" . ($allowDelete ? 9 : 8) . "'>No records found.</td></tr>";
    }

    echo "</tbody></table></div>";
}

// Function to display the queries table
function displayQueriesTable($conn, $allowDelete = false)
{
    echo "<h2 id='Queries-information'>Queries</h2>";
    echo "<p>See what they ask</p>";

    echo "<div class='table-responsive'>";
    echo "<table class='table table-bordered'>";
    echo "<thead><tr><th>Name</th><th>Contact Number</th><th>Email</th><th>Subject</th><th>Message</th><th>Time Added</th>";
    if ($allowDelete) {
        echo "<th>Action</th>";
    }
    echo "</tr></thead><tbody>";

    $sql    = "SELECT * FROM queries";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['query_user'] . "</td>";
            echo "<td>" . $row['query_phone'] . "</td>";
            echo "<td>" . $row['query_email'] . "</td>";
            echo "<td>" . $row['query_title'] . "</td>";
            echo "<td>" . $row['query_body'] . "</td>";
            echo "<td>" . $row['query_created_at'] . "</td>";
            if ($allowDelete) {
                echo "<td><a href='?delete_queries=" . $row['query_id'] . "' class='btn btn-danger btn-sm' onclick=\"return confirm('Are you sure you want to delete this query?');\">Delete</a></td>";
            }
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='" . ($allowDelete ? 7 : 6) . "'>No records found.</td></tr>";
    }

    echo "</tbody></table></div>";
}