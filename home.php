<!DOCTYPE html>
<html lang="en">
<?php include "connect.php"; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .large-font {
            font-size: 500%;
            font-weight: bold;
        }

        .hero-section {
            position: relative;
            height: 90vh;
            background: url('https://as1.ftcdn.net/v2/jpg/06/16/97/16/1000_F_616971603_EhUDCohW3KyX32VtW86LsaASHwUA5gFq.jpg') no-repeat center center;
            background-size: cover;
        }

        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(5px);
        }

        .hero-text {
            position: relative;
            z-index: 2;
        }

        .nav-logo {
            max-width: 150px;
            object-fit: contain;
        }

        .nav-link.btn-link {
            color: #fff;
            font-weight: bold;
            text-decoration: none;
        }

        .nav-link.btn-link:hover {
            text-decoration: underline;
        }

        .navbar-light .navbar-toggler-icon {
            background-color: #000;
        }

        .navbar-light .navbar-toggler {
            border-color: #000;
        }

        .table-responsive {
            margin-top: 20px;
        }

        .company-links a {
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .company-links a:hover {
            color: #0d6efd;
        }

        footer a {
            text-decoration: none;
        }

        /* Button Color */
        .btn-dark {
            background-color: #343a40;
            border-color: #343a40;
        }

        .btn-dark:hover {
            background-color: #23272b;
            border-color: #1d2124;
        }

        .card-hover {
            transition: transform 0.5s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .carousel-indicator img {
            width: 70px;
            display: block;
        }

        .carousel-indicator {
            position: unset;
        }

        .carousel-indicator button {
            width: max-content !important;

        }




        .carousel-control-prev,
        .carousel-control-next {
            background-color: rgb(0, 0, 0);
            filter: invert(1);


        }


        #best {
            font-size: 40px;
            padding-top: 30px;
        }

        .carousel-item img {
            height: 400px;
            /* Adjust as needed */
            object-fit: cover;
        }

        #full {
            background-color: whitesmoke;
        }

        marquee {
            background-color: #E6ECF5;
            height: 60px;
        }

        #link {
            color: #333333;
        }
    </style>
    <title>Home - Placement Portal</title>
</head>


<!-- Header and Navbar -->
<header>
    <div class="container">
        <div class="row">
            <div class="col">
                <button class="btn btn-dark btn-hover">Announcements</button>
                
            </div>
            <div class="col">
                <a class='text-decoration-none' id='link' href='places.jpg'>
                    <marquee direction="right" scrollamount="7" id="marid">
                        <?php



                        // Fetch latest 5 interviews ordered by date
                        $res = mysqli_query($db, "SELECT * FROM interview ORDER BY date_int ASC LIMIT 5");

                        if (mysqli_num_rows($res) > 0) {
                            while ($row = mysqli_fetch_assoc($res)) {
                                echo "<h5 class='mx-auto mt-3'>Upcoming interviews: " . $row['name'] . ", " . $row['dept'] . " on " . $row['date_int'] . " at " . $row['loc'] . "-Visit now</h5> ";
                            }
                        } else {
                            echo "No upcoming interviews.";
                        }

                        ?>
                    </marquee>
                </a>

            </div>
        </div>
    </div>



    <nav class="navbar navbar-expand-lg navbar-dark bg-muted shadow-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="navimg.jpg" alt="Portal Logo" width="340px">
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



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap Carousel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body id="full">
    <!-- Hero Section -->
    <div>
        <section class="hero-section d-flex align-items-center justify-content-center text-center text-white">
            <div class="hero-overlay"></div>
            <div class="container hero-text">
                <h1 class="display-2 fw-bold">Placement Portal</h1>
                <p class="lead fs-3 fst-italic">Your gateway to the dream job</p>
            </div>
        </section>

    </div>
    <h3 class="my-3 text-dark text-center" id="best">

        Bests from VCE...

    </h3>
    <div class="carousel py-3 " id="carouseldemo" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="2000">
                <img src="WhatsApp Image 2025-04-01 at 16.22.34_c046aa56.jpg" alt="pic-1" class="w-100 h-50">
            </div>
            <div class="carousel-item">
                <img src="pic1.jpg" alt="pic-2" class="w-100 h-50">
            </div>
            <div class="carousel-item">
                <img src="WhatsApp Image 2025-04-01 at 16.22.35_e58e7b92.jpg" alt="pic-3" class="w-100 h-50">
            </div>


        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouseldemo" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next " type="button" data-bs-target="#carouseldemo" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>

        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouseldemo" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#carouseldemo" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#carouseldemo" data-bs-slide-to="2"></button>


        </div>
    </div>
</body>

</html>

<!-- Upcoming Interviews -->


<!-- Job and Internship Links -->
<section class="my-5 text-center">
    <h3 class="mb-4">For jobs and internships in your field, click below!</h3>
    <div class="company-links">
        <!-- CSE Jobs -->
        <h4 class="text-dark">Computer Science Engineering (CSE)</h4>
        <div class="row my-3">
            <div class="col">
                <div class="card shadow-lg card-hover py-3">
                    <div class="card-body text-center">
                        <a href="https://www.zoho.com/careers/" class="text-dark">Zoho</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow-lg card-hover py-3">
                    <div class="card-body text-center">
                        <a href="https://careers.google.com" class="text-dark">Google</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow-lg card-hover py-3">
                    <div class="card-body text-center">
                        <a href="https://jobs.cisco.com/" class="text-dark">Cisco</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow-lg card-hover py-3">
                    <div class="card-body text-center">
                        <a href="https://jobs.intel.com/en" class="text-dark">Intel</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- ECE Jobs -->
        <h4 class="text-dark mt-4">Electronics and Communication Engineering (ECE)</h4>
        <div class="row my-3">
            <div class="col">
                <div class="card shadow-lg card-hover py-3">
                    <div class="card-body text-center">
                        <a href="https://careers.qualcomm.com/" class="text-dark">Qualcomm</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow-lg card-hover py-3">
                    <div class="card-body text-center">
                        <a href="https://www.samsungcareers.com/?lang=en" class="text-dark">Samsung</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow-lg card-hover py-3">
                    <div class="card-body text-center">
                        <a href="https://www.nokia.com/careers/" class="text-dark">Nokia</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow-lg card-hover py-3">
                    <div class="card-body text-center">
                        <a href="https://www.ti.com/careers" class="text-dark">Texas Instruments</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- EEE Jobs -->
        <h4 class="text-dark mt-4">Electrical and Electronics Engineering (EEE)</h4>
        <div class="row my-3">
            <div class="col">
                <div class="card shadow-lg card-hover py-3">
                    <div class="card-body text-center">
                        <a href="https://www.ge.com/careers" class="text-dark">General Electric</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow-lg card-hover py-3">
                    <div class="card-body text-center">
                        <a href="https://jobs.siemens.com/" class="text-dark">Siemens</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow-lg card-hover py-3">
                    <div class="card-body text-center">
                        <a href="https://www.se.com/in/en/about-us/careers/overview.jsp" class="text-dark">Schneider
                            Electric</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow-lg card-hover py-3">
                    <div class="card-body text-center">
                        <a href="https://www.tesla.com/careers" class="text-dark">Tesla</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Civil Jobs -->
        <h4 class="text-dark mt-4">Civil Engineering</h4>
        <div class="row my-3">
            <div class="col">
                <div class="card shadow-lg card-hover py-3">
                    <div class="card-body text-center">
                        <a href="https://www.larsentoubro.com/corporate/careers/" class="text-dark">L&T</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow-lg card-hover py-3">
                    <div class="card-body text-center">
                        <a href="https://www.afcons.com/careers" class="text-dark">Afcons</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow-lg card-hover py-3">
                    <div class="card-body text-center">
                        <a href="https://www.hccindia.com/career" class="text-dark">HCC</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow-lg card-hover py-3">
                    <div class="card-body text-center">
                        <a href="https://www.tataprojects.com/careers" class="text-dark">Tata Projects</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mechanical Jobs -->
        <h4 class="text-dark mt-4">Mechanical Engineering</h4>
        <div class="row my-3">
            <div class="col">
                <div class="card shadow-lg card-hover py-3">
                    <div class="card-body text-center">
                        <a href="https://www.bosch.in/careers/" class="text-dark">Bosch</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow-lg card-hover py-3">
                    <div class="card-body text-center">
                        <a href="https://www.hindustancopper.com/Page/Career_new" class="text-dark">Hindustan
                            Copper</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow-lg card-hover py-3">
                    <div class="card-body text-center">
                        <a href="https://www.bharatforge.com/careers/careers" class="text-dark">Bharat
                            Forge</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow-lg card-hover py-3">
                    <div class="card-body text-center">
                        <a href="https://careers.bhel.in/" class="text-dark">BHEL</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



</main>

<!-- Footer -->
<footer class="bg-dark text-white text-center py-4">
    <div class="container">
        <p class="mb-1">&copy; 2025 Vaigai College of Engineering. All Rights Reserved.</p>
        <p class="mb-2">
            <a href="#" class="text-white mx-2">CSE</a> |
            <a href="#" class="text-white mx-2">ECE</a> |
            <a href="#" class="text-white mx-2">EEE</a> |
            <a href="#" class="text-white mx-2">Civil</a> |
            <a href="#" class="text-white mx-2">Mechanical</a>
        </p>
        <div>
            <a href="https://www.facebook.com/vaigaicollegeofengg/" class="text-white mx-2"><i
                    class="bi bi-facebook"></i></a>
            <a href="https://x.com/vaigai_engg?mx=2" class="text-white mx-2"><i class="bi bi-twitter"></i></a>
            <a href="https://www.instagram.com/vaigaicollegeofengg/?hl=en" class="text-white mx-2"><i
                    class="bi bi-instagram"></i></a>
            <a href="https://www.linkedin.com/school/vaigaicollegeofengineeringmadurai/posts/?feedView=all"
                class="text-white mx-2"><i class="bi bi-linkedin"></i></a>
        </div>
    </div>
</footer>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz4fnFO9gybT4WfX9a+vzN9WiXh5+z5d9Hhtxu5LrdSHj4pF0m8uwlQg1+"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-cuDgdyI+xx2XP6/Jdt6syGEqfC5FsglGd2TOI/pO1z6VsAq8jj5YYeWwqrcqd+fw"
    crossorigin="anonymous"></script>
</body>

</html>