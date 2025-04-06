<!DOCTYPE html>
<html lang="en">
<?php
include "connect.php";
session_start();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Placed Students</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body>
    <header>
        <nav class="navbar navbar-static-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a href="#" class="navbar-brand">
                        <img src="https://www.eventalways.com/media/companylogo/large/vaigaicollegeofengineering-logo-1587106849.jpg"
                            alt="img" width=90 height=90 class="d-inline-block align-text-center"></a>
                    <span class="ms-1 h3">Vaigai college of engineering</span>


                </div>

            </div>


            </div>
        </nav>
    </header>

    <div class="container mt-5">

        <h3 class="text-center my-3">Placed Students</h3>

        <table class="table table-bordered table-hover mt-4">
            <thead class="table-dark">
                <tr>
                    <th>Name</th>
                    <th>Reg No</th>
                    <th>Batch</th>
                    <th>Department</th>
                    <th>Company</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $dept_counts = [];
                $res = mysqli_query($db, "SELECT * FROM placed");
                if ($res && mysqli_num_rows($res) > 0) {
                    while ($row = mysqli_fetch_assoc($res)) {
                        echo "<tr>";
                        echo "<td>{$row['name']}</td>";
                        echo "<td>{$row['regno']}</td>";
                        echo "<td>{$row['batch']}</td>";
                        echo "<td>{$row['dept']}</td>";
                        echo "<td>{$row['company']}</td>";
                        echo "</tr>";

                        // Count placements per department
                        $dept = $row['dept'];
                        if (isset($dept_counts[$dept])) {
                            $dept_counts[$dept]++;
                        } else {
                            $dept_counts[$dept] = 1;
                        }
                    }
                } else {
                    echo "<tr><td colspan='6' class='text-center'>No students placed yet</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <!-- Chart -->
        <h3 class="text-center mt-5">Placement Statistics by Department</h3>
        <canvas id="placementChart" width="400" height="200"></canvas>

        <script>
            var ctx = document.getElementById('placementChart').getContext('2d');
            var chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode(array_keys($dept_counts)); ?>,
                    datasets: [{
                        label: 'Number of Students Placed',
                        data: <?php echo json_encode(array_values($dept_counts)); ?>,
                        backgroundColor: 'rgba(54, 162, 235, 0.6)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>