<!DOCTYPE html>
<html lang="en">
<?php
include "connect.php";
session_start(); // Start session before using session variables

if (isset($_SESSION["login_user"])) {
    ?><br>
    <?php echo "Hello, " . $_SESSION["login_user"];
}

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>resume</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
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


        <div class="card shadow w-75 mx-auto">
            <h3 class="card-title text-center">Personal Details</h3>

            <form method="POST" enctype="multipart/form-data" class="mx-auto h5 fw">
                <div class="row py-3">
                    <div class="col-4 my-3">
                        <label for="name">Upload your photo</label><br>
                        <input type="file" name="photo" accept="image/*"><br>
                        <label for="fullname" class="py-3">Full name</label>
                        <input type="text" name="fullname" class="form-control w-50 py-3 my-2">
                        <label for="regno">Register number</label>
                        <input type="number" name="regno" class="form-control w-50 py-3 my-2">
                    </div>
                    <div class="col-4 my-3">
                        <label for="dept">Department</label>
                        <input type="text" name="dept" class="form-control w-50 py-3 my-2">
                        <label for="collegename">College name</label>
                        <input type="text" name="collegename" class="form-control w-50 py-3 my-2">
                        <label for="graduationyear">Graduation year</label>
                        <input type="text" name="graduationyear" class="form-control w-50 py-3 my-2">
                    </div>
                    <div class="col-4 my-3">
                        <label for="dob">Date of birth</label>
                        <input type="date" name="dob" class="form-control w-50 py-3 my-2">
                        <label for="mobileno">Mobile number</label>
                        <input type="number" name="mobileno" class="form-control w-50 py-3 my-2">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control w-50 py-3 my-2">
                    </div>
                    <label for="place">Place of birth</label>
                    <input type="text" name="place" class="form-control w-25 py-3 my-2">
                </div>



                <h3>Academic details</h3>
                <div class="row py-3">
                    <div class="col py-3">
                        <label for="cgpa">Overall CGPA</label>
                        <input type="number" step="0.01" name="cgpa" class="form-control w-25 my-3">
                    </div>
                    <div class="col py-3">
                        <label for="arrear">Any history of arrear</label><br>
                        <label for="arrear_yes">Yes</label>
                        <input type="radio" name="arrear" value="1" id="arrear_yes" class="my-3">
                        <label for="arrear_no">No</label>
                        <input type="radio" name="arrear" value="0" id="arrear_no" class="my-3">
                    </div>
                </div>

                <h3>Certifications, Extracurricular and Internships</h3>
                <div class="row py-3">
                    <div class="col-4 my-2">
                        <label for="certificate">Upload your certificates</label><br>
                        <input type="file" name="certificate" class="py-3 my-3" webkitdirectory multiple /><br>
                        <label for="internship">Any experience of internship</label><br>
                        <label for="internship_yes">Yes</label>
                        <input type="radio" name="internship" value="1" id="internship_yes" class="my-3">
                        <label for="internship_no">No</label>
                        <input type="radio" name="internship" value="0" id="internship_no" class="my-3"><br>
                        <label for="internship_certificate" class="mt-3">Upload your internship certificate</label><br>
                        <input type="file" name="internship_certificate" class="py-3 my-3" webkitdirectory multiple />
                    </div>
                    <div class="col-4 my-2">
                        <label for="companyname">Enter company name (internship)</label>
                        <input type="text" name="companyname" class="form-control w-50 py-3 my-3"
                            placeholder="ABC Technologies, Chennai[multiple company-comma separated]">
                        <label for="internship_duration">Duration of internship in days</label>
                        <input type="number" name="internship_duration" class="form-control w-50 py-3 ">
                    </div>
                    <div class="col-4 my-2">
                        <label for="sports_achieve">Sports achievements (if any)</label><br>
                        <input type="text" name="sports_achieve" class="form-control w-50 py-3"><br>
                        <label for="academic_achieve">Academic achievements (if any)</label><br>
                        <input type="text" name="academic_achieve" class="form-control w-50 py-3 "><br>
                    </div>
                </div>

                <h3>Skills and Interests</h3>
                <div class="row">
                    <div class="col">
                        <label for="domain">Enter your domain</label>
                        <input type="text" name="domain" class="form-control py-3 w-25 my-3">
                        <label for="skills">Enter your skills (separated by commas)</label>
                        <input type="text" name="skills" class="form-control py-3 w-25 my-3"
                            placeholder="html, css, javascript, python...">
                    </div>
                    <div class="col">
                        <label for="hackathon_certificate">Upload hackathon/presentation certificate (if any)</label>
                        <input type="file" name="hackathon_certificate" class="my-3" webkitdirectory multiple>
                    </div>
                </div>

                <h3>Resume and CV Upload</h3>
                <div class="row">
                    <div class="col">
                        <label for="resume_cv_upload">Type filename as studentnamedept.fileextension</label><br>
                        <input type="file" name="resume_cv_upload" class="my-3"><br>


                    </div>
                    <div class="col">
                        <label for="resume_cv_upload">Linkedin profile url</label><br>
                        <input type="text" name="linkedin" class="my-3"><br>


                    </div>

                </div>


                <input type="submit" class="btn btn-dark mt-3" name="upload" value="Upload">
            </form>
        </div>



        <?php

        if (isset($_POST['upload'])) {
            $upload_dir = "uploads/";

            // Ensure the upload directory exists
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }

            // Handle Photo Upload
            $photo_path = "";
            if (!empty($_FILES['photo']['name'])) {
                $photo_name = time() . "_" . basename($_FILES['photo']['name']); // Prevent duplicate names
                $photo_path = $upload_dir . $photo_name;
                move_uploaded_file($_FILES['photo']['tmp_name'], $photo_path);
            }

            // Handle Certificate Upload
            $certificate_path = "";
            if (!empty($_FILES['certificate']['name'])) {
                $certificate_name = time() . "_" . basename($_FILES['certificate']['name']);
                $certificate_path = $upload_dir . $certificate_name;
                move_uploaded_file($_FILES['certificate']['tmp_name'], $certificate_path);
            }

            // Handle Internship Certificate Upload
            $internship_certificate_path = "";
            if (!empty($_FILES['internship_certificate']['name'])) {
                $internship_certificate_name = time() . "_" . basename($_FILES['internship_certificate']['name']);
                $internship_certificate_path = $upload_dir . $internship_certificate_name;
                move_uploaded_file($_FILES['internship_certificate']['tmp_name'], $internship_certificate_path);
            }

            // Handle Resume/CV Upload
            $resume_cv_path = "";
            if (!empty($_FILES['resume_cv_upload']['name'])) {
                $resume_cv_name = time() . "_" . basename($_FILES['resume_cv_upload']['name']);
                $resume_cv_path = $upload_dir . $resume_cv_name;
                move_uploaded_file($_FILES['resume_cv_upload']['tmp_name'], $resume_cv_path);
            }

            // Handle Hackathon Certificate Upload
            $hackathon_certificate_path = "";
            if (!empty($_FILES['hackathon_certificate']['name'])) {
                $hackathon_certificate_name = time() . "_" . basename($_FILES['hackathon_certificate']['name']);
                $hackathon_certificate_path = $upload_dir . $hackathon_certificate_name;
                move_uploaded_file($_FILES['hackathon_certificate']['tmp_name'], $hackathon_certificate_path);
            }

            // Insert into personal table
            $query1 = "INSERT INTO personal (photo, fullname, regno, dept, collegename, graduationyear, dob, mobileno, email, place) 
       VALUES ('$photo_path', '{$_POST['fullname']}', '{$_POST['regno']}', '{$_POST['dept']}', '{$_POST['collegename']}', '{$_POST['graduationyear']}', '{$_POST['dob']}', '{$_POST['mobileno']}', '{$_POST['email']}', '{$_POST['place']}')";
            mysqli_query($db, $query1) or die("Error: " . mysqli_error($db));

            // Insert into academic table
            $query2 = "INSERT INTO academic (fullname, regno, cgpa, arrear) 
       VALUES ('{$_POST['fullname']}', '{$_POST['regno']}', '{$_POST['cgpa']}', '{$_POST['arrear']}')";
            mysqli_query($db, $query2) or die("Error: " . mysqli_error($db));

            // Insert into certifications_internships table
            $query3 = "INSERT INTO certifications_internships (fullname, regno, certificate, internship, internship_certificate, companyname, internship_duration, sports_achieve, academic_achieve) 
       VALUES ('{$_POST['fullname']}', '{$_POST['regno']}', '$certificate_path', '{$_POST['internship']}', '$internship_certificate_path', '{$_POST['companyname']}', '{$_POST['internship_duration']}', '{$_POST['sports_achieve']}', '{$_POST['academic_achieve']}')";
            mysqli_query($db, $query3) or die("Error: " . mysqli_error($db));

            // Insert into skills_interests_resume table
            $query4 = "INSERT INTO skills_interests_resume (fullname, regno, domain, skills, hackathon_certificate, resume_cv_upload,applied_company) 
       VALUES ('{$_POST['fullname']}', '{$_POST['regno']}', '{$_POST['domain']}', '{$_POST['skills']}', '$hackathon_certificate_path', '$resume_cv_path','{$_POST['linkedin']}')";
            mysqli_query($db, $query4) or die("Error: " . mysqli_error($db));

            $_SESSION["login_user"] = $_POST["fullname"];





            echo "<script>alert('Upload successful!');</script>";
            echo "<script>window.location.href = 'student_preview.php';</script>";

        }
        ?>










        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
</body>

</html>