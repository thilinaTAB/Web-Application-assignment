<?php
include_once 'Header.php';

include_once 'include/dbh.inc.php'; // Database connection

?>

                <!-- Doctors Table -->
                <table class="table">
    <thead>
        <tr>
            <th class=>Doctor's Name</th>
            <th>Specialization</th>

        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT * FROM doctors";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['DoctorName'] . "</td>";
                echo "<td>" . $row['DocSpec'] . "</td>";
            }
        } else {
            echo "<tr><td colspan='3'>No records found.</td></tr>";
        }
        ?>
    </tbody>
</table>

    <?php
include_once 'Footer.php';
?>