<?php
    include_once 'Header.php';
    include_once 'include/dbh.inc.php'; // Database connection
?>

<!-- Doctors Table -->
<section class="page-title bg-1">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block text-center">
                    <h1> Available Doctors Today!</h1>
                </div>
            </div>
        </div>
    </div>
</section>
<br><br>

<!-- Search Form -->
<div class="d-flex justify-content-end position-relative">
<form method="GET" class="form-inline" style="text-align: right; margin-bottom: 20px;">
    <input type="text" name="search" class="form-control" placeholder="Search Doctor Name"
    value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>" style="width: 250px;">
    <button type="submit" class="btn btn-secondary">Search</button>
</form>
</div>

<!-- Doctors Table -->
<table class="table table-striped table-dark col-lg-6" style="margin-left:auto; margin-right:auto;">
    <thead>
        <tr>
            <th class="bg-info"><h3 class="text-dark">Doctor's Name</h3></th>
            <th class="bg-info"><h3 class="text-dark">Specialization</h3></th>
        </tr>
    </thead>
    <tbody>
        <?php
            // Check if search parameter is set
            $search = isset($_GET['search']) ? $_GET['search'] : '';

            // SQL query with search functionality
            $sql    = "SELECT * FROM doctors WHERE DoctorName LIKE '%$search%' ORDER BY DoctorName ASC";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td><ul><li>" . $row['DoctorName'] . "</li></ul></td>";
                    echo "<td>" . $row['DocSpec'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='2'>No records found.</td></tr>";
            }
        ?>
    </tbody>
</table>

<br><br>

<?php
    include_once 'Footer.php';
?>
