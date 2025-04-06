<!DOCTYPE html>
<html lang="en">
<?php
include "connect.php";


?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <header>

        <nav class="navbar navbar-static-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a href="#" class="navbar-brand">
                        <img src="https://www.eventalways.com/media/companylogo/large/vaigaicollegeofengineering-logo-1587106849.jpg"
                            alt="img" width=90 height=90 class="d-inline-block align-text-center"></a>
                    <span class="ms-1 h3">Vaigai College of Engineering</span>
                </div>
                <ul class="nav nav-bar px-4 h4">
                    <li class="nav-item inline-block mx-3 align-text-center"><a class="text-dark"
                            href="home.php">Home</a></li>
                    <li class="nav-item inline-block mx-3 align-text-center"><a class="text-dark"
                            href="register.php">New user</a></li>
                    <li class="nav-item inline-block mx-3 align-text-center text-dark">
                        <div class="dropdown">
                            <button class="btn btn-dark dropdown-toggle text-light h3" type="button"
                                id="dropdownMenuButton" data-bs-toggle="dropdown">Login</button>
                            <div class="dropdown-menu h3">
                                <a href="student_login.php">Student Login</a>
                                <a href="institution_login.php">Institution Login</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item inline-block mx-3 align-text-center"><a class="text-dark"
                            href="resume_analyzer.php">Resume analyzer</a></li>
                    <li class="nav-item mx-3"><a class="text-dark" href="chat_outer.php">Chat</a></li>

                </ul>
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
                        <h3 class="card-title text-center">Login</h3>
                        <form method="POST">
                            <label for="email" class="my-3">Email</label>
                            <input type="email" name="email_i" class="form-control" required>
                            <label for="password" class="my-3">Password</label>
                            <input type="password" name="password_i" class="form-control" required>
                            <br>
                            <button type="submit" name="login"
                                class="btn btn-default btn-dark text-light my-3">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    if (isset($_POST['login'])) {
        // Sanitize inputs to avoid SQL injection
        $email = mysqli_real_escape_string($db, $_POST['email_i']);
        $password = mysqli_real_escape_string($db, $_POST['password_i']);

        // Correct SQL query syntax
        $res = mysqli_query($db, "SELECT email_i, password_i FROM inst_reg WHERE email_i='$email' AND password_i='$password'");

        // Check if any rows are returned
        if (mysqli_num_rows($res) > 0) {
            echo "Login successful";
            ?>
            <script type="text/javascript">
                window.location = "chat_inner.php";
            </script>
            <?php



        } else {
            echo "Invalid email or password";
        }
    }
    ?>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>