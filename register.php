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
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>



    <header>

        <nav class="navbar navbar-expand-lg navbar-dark bg-muted shadow-lg">
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

    <div class="container">
        <div class="row">
            <div class="col">
                <img src="https://media.istockphoto.com/id/1298405314/vector/job-interview.jpg?s=612x612&w=0&k=20&c=F3P4brlXN7S35fe73OrxrKs0-FMc3VoMSuv6I6VIcGg="
                    alt="img">
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title text-center">Register</h3>
                        <form action="register.php" method="POST">
                            <label for="name" class="my-3">Username</label>
                            <input type="text" name="name" class="form-control" required>
                            <label for="email" class="my-3">Email</label>
                            <input type="email" name="email" class="form-control" required>
                            <label for="password" class="my-3">Password</label>
                            <input type="password" name="password" class="form-control" required>
                            <br>
                            <button type="submit" name="register"
                                class="btn btn-default btn-dark text-light my-3">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    if (isset($_POST['register'])) {
        $query = "INSERT INTO finalyr(name, email, password) VALUES('$_POST[name]','$_POST[email]','$_POST[password]')";

        if (mysqli_query($db, $query)) {
            echo "Registration successful!";
            echo "<script>window.location.href='student_login.php';</script>";
            exit(); // Ensures no further execution
        } else {
            echo "Error: " . mysqli_error($db);
        }
    }
    ?>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>