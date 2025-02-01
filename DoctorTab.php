<?php
include_once 'Header.php';

include_once 'include/dbh.inc.php'; // Database connection

?>

                <!-- Doctors Table -->
                <table class="table table-striped table-dark col-lg-6" style="margin-left:auto; margin-right:auto;">
    <thead>
        <tr>
            <th class="bg-info"><h3 class="text-dark">Doctor's Name </h3> </th>
            <th class="bg-info"><h3 class="text-dark"> Specialization </h3></th>

        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT * FROM doctors ORDER BY DoctorName ASC";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td><ul><li>"."Dr. "  . $row['DoctorName'] . "</td>";
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