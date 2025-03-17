<?php
require 'dbh.inc.php';

if (isset($_GET['query'])) {
    $query = "%" . $_GET['query'] . "%"; // Prepare for LIKE search

    $sql = "
        SELECT hospserv_id AS id, service_name AS name, 'hospital' AS type FROM hospital_services WHERE service_name LIKE ?
UNION
SELECT labserv_id AS id, test_name AS name, 'laboratory' AS type FROM laboratory_services WHERE test_name LIKE ?
";

    // Prepare the SQL statement
    $stmt = $conn->prepare($sql);
    if (! $stmt) {
        die('SQL error: ' . $conn->error); // Shows the error
    }

    $stmt->bind_param("ss", $query, $query);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div onclick=\"redirectToService('" . htmlspecialchars($row['type']) . "', " . intval($row['id']) . ")\">";
            echo "<strong>" . htmlspecialchars($row['name']) . "</strong>";
            echo "</div>";
        }
    } else {
        echo "<div>No results found.</div>";
    }

    $stmt->close();
    $conn->close();
}