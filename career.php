<!DOCTYPE html>
<html lang="en">

<?php include "connect.php";
session_start();
if (isset($_SESSION['login_user'])) {
    echo "<br>hello, " .
        $_SESSION['login_user'];
} ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .large-font {
            font-size: 500%;
            /* Adjust size as needed */
            font-weight: bold;
        }

        .quote {
            font-style: italic;
            font-size: 500%;
            color: #555;
            /* Adjust color as needed */
        }
    </style>




    <title>Home</title>
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
                <ul class="nav nav-bar px-4 h4  ">
                    <li class="nav-item inline-block mx-3 align-text-center"><a class="text-dark"
                            href="home.php">Home</a></li>
                    <li class="nav-item inline-block mx-3 align-text-center"><a class="text-dark"
                            href="register.php">register</a>
                    </li>
                    <li class="nav-item inline-block mx-3 align-text-center text-dark">
                        <div class="dropdown">
                            <button class="btn btn-dark dropdown-toggle text-light h3 " type="button"
                                id="dropdownMenuButton" data-bs-toggle="dropdown">
                                login
                            </button>
                            <div class="dropdown-menu h3">
                                <a href="student_login.php">student login</a>
                                <a href="institution_login.php">instituition login</a>

                            </div>
                        </div>

                    </li>
                    <li class="nav-item inline-block mx-3 align-text-center"> <a class="text-dark"
                            href="profile.php">Profile</a>
                    </li>

                </ul>
            </div>
            </div>
        </nav>
    </header>
    <div class="container mx-auto">
        <div class="row py-3 ">
            <h3 class="text-center">Company applied</h3>
        </div>
        <div class="row">

            <form class="py-3" method="POST">
                <div class="card w-75 mx-auto py-3 shadow-lg">
                    <label for="name" class="text-center">Name</label>
                    <input type="text" class="form-control w-25 mx-auto" name="name">
                    <label for="name" class="text-center">Regno</label>
                    <input type="text" class="form-control w-25 mx-auto" name="regno">
                    <label for="name" class="text-center">Company applied</label>
                    <input type="text" class="form-control w-25 mx-auto" name="batch">

                    <label for="name" class="text-center">Status</label>
                    <label class="text-center">1.Applied 2.Shortlisted 3.Rejected</label>
                    <input type="text" class="form-control w-25 mx-auto" name="dept">


                    <input type="submit" value="submit" class="btn btn-outline-dark w-25 mx-auto mt-3" name="submit">

                </div>


            </form>

        </div>

    </div>
    <?php

    if (isset($_POST['submit'])) {

        $res = mysqli_query($db, "INSERT INTO career (name, regno,batch, dept, company) VALUES ('$_POST[name]', '$_POST[regno]', '$_POST[batch]', '$_POST[dept]', '$_POST[company]')");
        if ($res) {
            echo 'Successfully updated';
            echo "<script>window.location.href = 'student_preview.php';</script>";

        } else {
            mysqli_error($db);
        }
    }
    ?>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>