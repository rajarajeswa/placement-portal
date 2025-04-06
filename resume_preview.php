<!DOCTYPE html>
<html lang="en">

<?php include "connect.php";
session_start();

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume Viewer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-muted shadow-lg me-3">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="navimg.jpg" alt="Portal Logo" width="300px">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav align-items-center">
                        <li class="mx-2">
                            <a class="text-white btn btn-secondary px-3" href="home.php">Home</a>
                        </li>
                        <li class="dropdown mx-2">
                            <a class="text-white btn btn-secondary px-3 dropdown-toggle" href="#" id="loginDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Login
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="loginDropdown">
                                <li><a class="dropdown-item" href="student_login.php">Student Login</a></li>
                                <li><a class="dropdown-item" href="instituition_login.php">Institution Login</a></li>
                            </ul>
                        </li>
                        <li class="mx-2">
                            <a class="text-white btn btn-secondary px-3 " href="resume_analyzer.php">Resume Analyzer</a>
                        </li>
                        <li class="mx-2">
                            <a class="text-white btn btn-secondary px-3" href="chat_outer.php">Chat</a>
                        </li>
                    </ul>
                </div>

            </div>
        </nav>

    </header>

    <div class="container mt-4">
        <?php

        $res = mysqli_query($db, "SELECT * FROM personal WHERE fullname='$_SESSION[login_user]'");

        if ($res && mysqli_num_rows($res) > 0) {
            echo "Personal details";
            echo "<table class='table table-hover table-bordered'>";
            echo "<thead><tr><th>Field</th><th>Value</th></tr></thead>";
            echo "<tbody>";

            while ($row = mysqli_fetch_assoc($res)) {
                echo "<tr><td>Photo</td><td><img src='{$row['photo']}' width='100' height='100' alt='Photo'></td></tr>";
                echo "<tr><td>Full Name</td><td>{$row['fullname']}</td></tr>";
                echo "<tr><td>Reg No</td><td>{$row['regno']}</td></tr>";
                echo "<tr><td>Department</td><td>{$row['dept']}</td></tr>";
                echo "<tr><td>College Name</td><td>{$row['collegename']}</td></tr>";
                echo "<tr><td>Graduation Year</td><td>{$row['graduationyear']}</td></tr>";
                echo "<tr><td>Date of Birth</td><td>{$row['dob']}</td></tr>";
                echo "<tr><td>Mobile No</td><td>{$row['mobileno']}</td></tr>";
                echo "<tr><td>Place</td><td>{$row['place']}</td></tr>";

            }

            echo "</tbody></table>";
        } else {
            echo "<p class='text-center text-danger h5'>No results found.</p>";
        }
        ?>
        <?php

        $res = mysqli_query($db, "SELECT cgpa,arrear FROM academic WHERE fullname='$_SESSION[login_user]'");

        if ($res && mysqli_num_rows($res) > 0) {
            echo "Academic details";
            echo "<table class='table table-hover table-bordered'>";
            echo "<thead><tr><th>Field</th><th>Value</th></tr></thead>";
            echo "<tbody>";

            while ($row = mysqli_fetch_assoc($res)) {
                echo "<tr><td>CGPA</td><td>{$row['cgpa']}</td></tr>";
                echo "<tr><td>Arrear</td><td>{$row['arrear']}</td></tr>";


            }

            echo "</tbody></table>";
        } else {
            echo "<p class='text-center text-danger h5'>No results found.</p>";
        }
        ?>
        <?php

        $res = mysqli_query($db, "SELECT certificate, internship, internship_certificate, companyname, internship_duration, sports_achieve, academic_achieve FROM certifications_internships WHERE fullname='$_SESSION[login_user]'");

        if ($res && mysqli_num_rows($res) > 0) {
            echo "<h4 class='text-center'>Certifications, Extracurricular and Internships</h4>";
            echo "<table class='table table-hover table-bordered'>";
            echo "<thead><tr><th>Field</th><th>Value</th></tr></thead>";
            echo "<tbody>";

            while ($row = mysqli_fetch_assoc($res)) {
                // Split certificates if multiple exist
                $certificates = !empty($row['certificate']) ? explode(",", $row['certificate']) : [];

                // Display certificates properly
                echo "<tr><td>Certificate</td><td>";
                if (!empty($certificates)) {
                    foreach ($certificates as $cert) {
                        $cert = trim($cert);
                        $file_ext = pathinfo($cert, PATHINFO_EXTENSION);

                        if (in_array(strtolower($file_ext), ['jpg', 'jpeg', 'png', 'gif'])) {
                            echo "<img src='$cert' width='100' height='100' alt='Certificate Image'><br>";
                        } else {
                            echo "<a href='$cert' target='_blank'>View Certificate</a><br>";
                        }
                    }
                } else {
                    echo "No certificates uploaded.";
                }
                echo "</td></tr>";

                // Display other fields
                echo "<tr><td>Internship</td><td>{$row['internship']}</td></tr>";

                // Internship Certificate Handling
                echo "<tr><td>Internship Certificate</td><td>";
                if (!empty($row['internship_certificate'])) {
                    $ext = pathinfo($row['internship_certificate'], PATHINFO_EXTENSION);
                    if (in_array(strtolower($ext), ['jpg', 'jpeg', 'png', 'gif'])) {
                        echo "<img src='{$row['internship_certificate']}' width='100' height='100' alt='Internship Certificate'>";
                    } else {
                        echo "<a href='{$row['internship_certificate']}' target='_blank'>View Internship Certificate</a>";
                    }
                } else {
                    echo "No internship certificate uploaded.";
                }
                echo "</td></tr>";

                echo "<tr><td>Company Name</td><td>{$row['companyname']}</td></tr>";
                echo "<tr><td>Internship Duration</td><td>{$row['internship_duration']}</td></tr>";
                echo "<tr><td>Sports Achievements</td><td>{$row['sports_achieve']}</td></tr>";
                echo "<tr><td>Academic Achievements</td><td>{$row['academic_achieve']}</td></tr>";
            }

            echo "</tbody></table>";
        } else {
            echo "<p class='text-center text-danger h5'>No results found.</p>";
        }
        ?>
        <?php

        $res = mysqli_query($db, "SELECT domain, skills, hackathon_certificate, resume_cv_upload FROM skills_interests_resume WHERE fullname='$_SESSION[login_user]'");

        if ($res && mysqli_num_rows($res) > 0) {
            echo "Skills, Interests, Resume";
            echo "<table class='table table-hover table-bordered'>";
            echo "<thead><tr><th>Field</th><th>Value</th></tr></thead>";
            echo "<tbody>";

            while ($row = mysqli_fetch_assoc($res)) {
                echo "<tr><td>Domain</td><td><img src='{$row['domain']}' width='100' height='100' alt='Photo'></td></tr>";
                echo "<tr><td>Skills</td><td>{$row['skills']}</td></tr>";
                echo "<tr><td>Hackathon certificate</td><td>{$row['hackathon_certificate']}</td></tr>";
                echo "<tr><td>Resume</td><td>{$row['resume_cv_upload']}</td></tr>";



            }

            echo "</tbody></table>";

        } else {
            echo "<p class='text-center text-danger h5'>No results found.</p>";
        }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>