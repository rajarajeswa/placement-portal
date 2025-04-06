<!DOCTYPE html>
<html lang="en">
<?php
include "connect.php";
session_start(); // Start session before using session variables


?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .card:hover {
            transform: scale(1.05);

        }

        /* Updated Card Styling */
        .card {
            background-color: #3949ab;
            /* Matches Navbar Color */
            color: white;
            /* Text color for contrast */
            transition: all 0.3s ease-in-out;
            border: none;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
        }

        .card-title {
            font-size: 1.2rem;
            font-weight: bold;
            color: #ffd700;
            /* Gold Title */
        }

        .text-muted {
            color: #d1c4e9 !important;
            /* Soft Purple for better contrast */
        }

        /* Buttons inside Cards */
        .card .btn {
            background-color: white;
            color: #1a237e;
            font-weight: bold;
            transition: 0.3s;
        }

        .card .btn:hover {
            background-color: #ffd700;
            /* Gold Hover */
            color: #1a237e;
        }

        #namehead {
            color: #1F2F47;
        }
    </style>

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
    <div class="container mt-5">

        <h3 class="text-center mt-3" id="namehead">👋 Hello, VCE! </h3>



        <div class="row g-4">
            <div class="col-md-3">
                <div class="card text-center shadow-lg border-0 rounded-4">
                    <img src="https://img.freepik.com/free-vector/profile-data-concept-illustration_114360-2770.jpg?ga=GA1.1.966632724.1729531154&semt=ais_hybrid"
                        alt="Student Profile" class="card-img-top p-3 rounded-4" height="250">
                    <div class="card-body">
                        <h4 class="card-title fw-bold text-white">Student profiles</h4>
                        <p class="text-muted">View your student profiles.</p>
                        <a href="students_info.php" class="btn btn-outline-primary w-100 fw-bold">Update my
                            status</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-center shadow-lg border-0 rounded-4">
                    <img src="https://img.freepik.com/free-vector/job-hunt-concept-illustration_114360-446.jpg?ga=GA1.1.966632724.1729531154&semt=ais_authors_boost"
                        alt="Update Student" class="card-img-top p-3 rounded-4" height="250">
                    <div class="card-body">
                        <h4 class="card-title fw-bold text-white">Placed students</h4>
                        <p class="text-muted">Update placed students.</p>
                        <a href="inst_update.php" class="btn btn-outline-success w-100 fw-bold">View My
                            Profile</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-center shadow-lg border-0 rounded-4">
                    <img src="https://img.freepik.com/free-vector/job-interview-concept-illustration_114360-24598.jpg?ga=GA1.1.966632724.1729531154&semt=ais_hybrid"
                        alt="Dashboard" class="card-img-top p-3 rounded-4" height="250">
                    <div class="card-body">
                        <h4 class="card-title fw-bold text-white">Upcoming interview</h4>
                        <p class="text-muted">Update upcoming interviews.</p>
                        <a href="upcoming_interview.php" class="btn btn-outline-danger w-100 fw-bold">Update
                            Profile</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center shadow-lg border-0 rounded-4">
                    <img src="https://img.freepik.com/free-vector/stock-market-analysis-with-chart_23-2148584739.jpg?ga=GA1.1.966632724.1729531154&semt=ais_hybrid"
                        alt="Dashboard" class="card-img-top p-3 rounded-4" height="250">
                    <div class="card-body">
                        <h4 class="card-title fw-bold text-white">Dashboard</h4>
                        <p class="text-muted">View dashboard.</p>
                        <a href="dashboard.php" class="btn btn-outline-danger w-100 fw-bold">Update status</a>
                    </div>
                </div>
            </div>

        </div>

    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>