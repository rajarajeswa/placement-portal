<!DOCTYPE html>
<html lang="en">
<?php
include "connect.php";
session_start();
if (isset($_SESSION['login_user'])) {
    echo "<br>hello, " . $_SESSION['login_user'];
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
        }

        h3 {
            color: #343a40;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }

        .table {
            background: #fff;
        }

        .table th,
        .table td {
            vertical-align: middle;
            text-align: left;
        }

        img {
            border-radius: 8px;
        }
    </style>

    <title>Student Details</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-static-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a href="#" class="navbar-brand">
                        <img src="https://www.eventalways.com/media/companylogo/large/vaigaicollegeofengineering-logo-1587106849.jpg"
                            alt="img" width="90" height="90" class="d-inline-block align-text-center">
                    </a>
                    <span class="ms-1 h3">Vaigai College of Engineering</span>
                </div>
            </div>
        </nav>
    </header>

    <div class="container">
        <h3>Student Details</h3>

        <?php
        if (isset($_GET['id'])) {
            $user_id = base64_decode($_GET['id']);
            $user_id = intval($user_id); // Ensure it's an integer
        
            // Personal Details
            $res = mysqli_query($db, "SELECT * FROM personal WHERE id='$user_id'");
            if ($res && mysqli_num_rows($res) > 0) {
                echo "<h3 class='mt-4'>Personal Details</h3>";
                echo "<table class='table table-bordered'>";
                while ($row = mysqli_fetch_assoc($res)) {
                    echo "<tr><th>Photo</th><td><img src='{$row['photo']}' width='100' height='100'></td></tr>";
                    echo "<tr><th>Full Name</th><td>{$row['fullname']}</td></tr>";
                    echo "<tr><th>Reg No</th><td>{$row['regno']}</td></tr>";
                    echo "<tr><th>Department</th><td>{$row['dept']}</td></tr>";
                    echo "<tr><th>College Name</th><td>{$row['collegename']}</td></tr>";
                    echo "<tr><th>Graduation Year</th><td>{$row['graduationyear']}</td></tr>";
                    echo "<tr><th>Date of Birth</th><td>{$row['dob']}</td></tr>";
                    echo "<tr><th>Mobile No</th><td>{$row['mobileno']}</td></tr>";
                    echo "<tr><th>Place</th><td>{$row['place']}</td></tr>";
                }
                echo "</table>";
            }

            // Academic Details
            $res = mysqli_query($db, "SELECT cgpa, arrear FROM academic WHERE id='$user_id'");
            if ($res && mysqli_num_rows($res) > 0) {
                echo "<h3 class='mt-4'>Academic Details</h3>";
                echo "<table class='table table-bordered'>";
                while ($row = mysqli_fetch_assoc($res)) {
                    echo "<tr><th>CGPA</th><td>{$row['cgpa']}</td></tr>";
                    echo "<tr><th>Arrear</th><td>{$row['arrear']}</td></tr>";
                }
                echo "</table>";
            }

            // Certifications & Internships
            $res = mysqli_query($db, "SELECT * FROM certifications_internships WHERE id='$user_id'");
            if ($res && mysqli_num_rows($res) > 0) {
                echo "<h3 class='mt-4'>Certifications, Internships & Achievements</h3>";
                echo "<table class='table table-bordered'>";
                while ($row = mysqli_fetch_assoc($res)) {
                    echo "<tr><th>Internship</th><td>{$row['internship']}</td></tr>";
                    echo "<tr><th>Company Name</th><td>{$row['companyname']}</td></tr>";
                    echo "<tr><th>Internship Duration</th><td>{$row['internship_duration']}</td></tr>";
                    echo "<tr><th>Sports Achievements</th><td>{$row['sports_achieve']}</td></tr>";
                    echo "<tr><th>Academic Achievements</th><td>{$row['academic_achieve']}</td></tr>";
                }
                echo "</table>";
            }
        }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>