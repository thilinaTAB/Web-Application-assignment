<?php
require 'dbh.inc.php'; // Ensure correct DB connection

if (isset($_GET['query'])) {
    $query = "%" . $_GET['query'] . "%"; // Prepare for LIKE search

    $sql = "
        SELECT id, service_name AS name, 'hospital' AS type FROM hospital_services WHERE service_name LIKE ?
        UNION
        SELECT id, test_name AS name, 'laboratory' AS type FROM laboratory_services WHERE test_name LIKE ?
        UNION
        SELECT id, service_name AS name, 'emergency' AS type FROM emergency_services WHERE service_name LIKE ?
    ";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $query, $query, $query);
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
