<?php
require 'dbh.inc.php'; // Ensure correct DB connection

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // Enable error reporting for MySQL

if (isset($_GET['query'])) {
    $query = "%" . $_GET['query'] . "%"; // Prepare for LIKE search

    $sql = "
        SELECT id, service_name AS name, 'hospital' AS type FROM hospital_services WHERE service_name LIKE ?
        UNION
        SELECT serv_id AS id, test_name AS name, 'laboratory' AS type FROM laboratory_services WHERE test_name LIKE ?
    ";

    // Prepare the SQL statement
    $stmt = $conn->prepare($sql);
    if (! $stmt) {
        die('SQL error: ' . $conn->error); // Shows the error if the query preparation fails
    }

    $stmt->bind_param("ss", $query, $query);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div><a href='service.php?type=" . htmlspecialchars($row['type']) . "&id=" . intval($row['id']) . "'>" .
            "<strong>" . htmlspecialchars($row['name']) . "</strong></a></div>";
        }
    } else {
        echo "<div>No results found.</div>";
    }

    $stmt->close();
    $conn->close();
}
