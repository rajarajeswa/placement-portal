<?php
if (isset($_POST['upload'])) {
    // Handle file uploads
    $photo = $_FILES['photo']['name'];
    $certificate = $_FILES['certificate']['name'];
    $internship_certificate = $_FILES['internship_certificate']['name'];
    $hackathon_certificate = $_FILES['hackathon_certificate']['name'];
    $resume_cv_upload = $_FILES['resume_cv_upload']['name'];

    // Move uploaded files to a specific directory
    $target_dir = "uploads/";
    move_uploaded_file($_FILES['photo']['tmp_name'], $target_dir . $photo);
    move_uploaded_file($_FILES['certificate']['tmp_name'], $target_dir . $certificate);
    move_uploaded_file($_FILES['internship_certificate']['tmp_name'], $target_dir . $internship_certificate);
    move_uploaded_file($_FILES['hackathon_certificate']['tmp_name'], $target_dir . $hackathon_certificate);
    move_uploaded_file($_FILES['resume_cv_upload']['tmp_name'], $target_dir . $resume_cv_upload);

    $sql = "INSERT INTO resumes (fullname, regno, dept, collegename, graduationyear, dob, mobileno, email, place, cgpa, arrear, internship, companyname, internship_duration, sports_achieve, academic_achieve, domain, skills, photo, certificate, internship_certificate, hackathon_certificate, resume_cv_upload)
            VALUES ('$fullname', '$regno', '$dept', '$collegename', '$graduationyear', '$dob', '$mobileno', '$email', '$place', '$cgpa', '$arrear', '$internship', '$companyname', '$internship_duration', '$sports_achieve', '$academic_achieve', '$domain', '$skills', '$photo', '$certificate', '$internship_certificate', '$hackathon_certificate', '$resume_cv_upload')";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        echo "Resume uploaded successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);

}
?>