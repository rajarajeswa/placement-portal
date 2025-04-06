<?php
include "connect.php";
session_start(); // Start session

// Check if user is logged in
if (!isset($_SESSION["login_user"])) {
    echo "<script>alert('You need to log in first!'); window.location.href='student_login.php';</script>";
    exit();
}

$username = $_SESSION["login_user"];

// Fetch user details using regno instead of fullname
$query = "SELECT personal.*, academic.cgpa, academic.arrear, 
                 certifications_internships.internship, certifications_internships.internship_duration, 
                 certifications_internships.internship_certificate,  
                 certifications_internships.certificate, certifications_internships.sports_achieve, 
                 certifications_internships.academic_achieve
          FROM personal
          JOIN academic ON personal.regno = academic.regno
          JOIN certifications_internships ON personal.regno = certifications_internships.regno
          WHERE personal.fullname = '$username'";

$result = mysqli_query($db, $query);

$user = mysqli_fetch_assoc($result);
$regno = $user['regno']; // Fetch regno

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape input to prevent SQL injection
    $mobileno = mysqli_real_escape_string($db, $_POST['mobileno'] ?? '');
    $email = mysqli_real_escape_string($db, $_POST['email'] ?? '');
    $place = mysqli_real_escape_string($db, $_POST['place'] ?? '');
    $cgpa = mysqli_real_escape_string($db, $_POST['cgpa'] ?? '');
    $arrear_academic = mysqli_real_escape_string($db, $_POST['arrear'] ?? '');
    $internship_duration = mysqli_real_escape_string($db, $_POST['internship_duration'] ?? '');
    $sports_achieve = mysqli_real_escape_string($db, $_POST['sports_achieve'] ?? '');
    $academic_achieve = mysqli_real_escape_string($db, $_POST['academic_achieve'] ?? '');

    // File Upload Handling
    function uploadFile($fileKey, $existingFile)
    {
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'pdf'];
        if (!empty($_FILES[$fileKey]['name'])) {
            $fileExtension = strtolower(pathinfo($_FILES[$fileKey]['name'], PATHINFO_EXTENSION));
            if (!in_array($fileExtension, $allowedExtensions)) {
                echo "<script>alert('Invalid file type! Allowed: jpg, jpeg, png, pdf');</script>";
                return $existingFile;
            }
            $filePath = "uploads/" . time() . "_" . basename($_FILES[$fileKey]['name']);
            if (move_uploaded_file($_FILES[$fileKey]['tmp_name'], $filePath)) {
                return $filePath;
            }
        }
        return $existingFile;
    }

    $photo = uploadFile('photo', $user['photo']);
    $internship_cert = uploadFile('internship_certificate', $user['internship_certificate']);
    $certificate = uploadFile('certificate', $user['certificate']);

    // Update queries
    $update_personal = "UPDATE personal SET
                        mobileno = '$mobileno',
                        email = '$email',
                        place = '$place',
                        photo = '$photo'
                        WHERE regno = '$regno'";

    $update_academic = "UPDATE academic SET
                        cgpa = '$cgpa',
                        arrear = '$arrear_academic'
                        WHERE regno = '$regno'";

    $update_certifications = "UPDATE certifications_internships SET
                        internship_duration = '$internship_duration',
                        internship_certificate = '$internship_cert',
                        certificate = '$certificate',
                        sports_achieve = '$sports_achieve',
                        academic_achieve = '$academic_achieve'
                        WHERE regno = '$regno'";

    // Execute queries and check for errors
    if (
        mysqli_query($db, $update_personal) &&
        mysqli_query($db, $update_academic) &&
        mysqli_query($db, $update_certifications)
    ) {
        echo "<script>alert('Profile updated successfully!'); window.location.href='student_preview.php';</script>";
    } 
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
    <div class="container mt-3">
        <h3 class="text-center">Edit Your Profile</h3>
        <form method="POST" enctype="multipart/form-data">
            <div class="card">
                <div class="card-body mx-auto py-3">
                    <label>Mobile Number</label>
                    <input type="text" name="mobileno" value="<?= htmlspecialchars($user['mobileno']); ?>"
                        class="form-control w-75">

                    <label>Email</label>
                    <input type="email" name="email" value="<?= htmlspecialchars($user['email']); ?>"
                        class="form-control w-75">

                    <label>Place</label>
                    <input type="text" name="place" value="<?= htmlspecialchars($user['place']); ?>"
                        class="form-control w-75">

                    <label>CGPA</label>
                    <input type="text" name="cgpa" value="<?= htmlspecialchars($user['cgpa']); ?>"
                        class="form-control w-75">

                    <label>Internship Duration</label>
                    <input type="text" name="internship_duration"
                        value="<?= htmlspecialchars($user['internship_duration']); ?>" class="form-control w-75">

                    <label>Sports Achievements</label>
                    <input type="text" name="sports_achieve" value="<?= htmlspecialchars($user['sports_achieve']); ?>"
                        class="form-control w-75">

                    <label>Academic Achievements</label>
                    <input type="text" name="academic_achieve"
                        value="<?= htmlspecialchars($user['academic_achieve']); ?>" class="form-control w-75">

                    <label>Profile Photo</label>
                    <input type="file" name="photo" class="form-control w-75">



                    <input type="submit" name="update" value="Update" class="btn btn-outline-dark w-75 mt-2">
                </div>
            </div>
        </form>
    </div>
</body>

</html>