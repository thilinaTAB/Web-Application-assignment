<?php
require 'dbh.inc.php'; // Ensure the correct path to your DB connection file

if (isset($_GET['query'])) {
    $query = $_GET['query'];
    $query = "%$query%"; // Prepare for LIKE search

    $sql = "
        SELECT service_name AS name, description FROM hospital_services WHERE service_name LIKE ?
        UNION
        SELECT test_name AS name, test_description FROM laboratory_services WHERE test_name LIKE ?
        UNION
        SELECT service_name AS name, availability FROM emergency_services WHERE service_name LIKE ?
    ";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $query, $query, $query);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div><strong>" . htmlspecialchars($row['name']) . "</strong>: " . htmlspecialchars($row['description']) . "</div>";
        }
    } else {
        echo "<div>No results found.</div>";
    }

    $stmt->close();
    $conn->close();
}
?>
