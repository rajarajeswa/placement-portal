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
    <title>login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

</head>
<style>
    .card {
        background-color: whitesmoke;
    }
</style>

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

    <div class="container mx-auto mt-3 ">
        <div class="row">
            <div class="col">
                <div class="card mt-4 shadow-lg">
                    <div class="card-body">
                        <h3 class="card-title text-center">Login</h3>
                        <form method="POST">
                            <label for="email" class="my-3">Name</label>
                            <input type="text" name="name" id="name" class="form-control" required onfocus="select()">
                            <label for="email" class="my-3">Email</label>
                            <input type="email" name="email" class="form-control" id="email" required onfocus="select()">
                            <label for="password" class="my-3">Password</label>
                            <div class="input-group">

                                <input type="password" name="password" class="form-control" id="password" required>
                                <span class="input-group-text" onclick="myfunc()" style="cursor: pointer;">
                                    <i class="bi bi-eye" id="icon"></i>
                                </span>

                            </div>

                            <br>
                            <button type="submit" name="login"
                                class="btn btn-default btn-secondary text-light my-3">Login</button>
                        </form>
                        <a href="register.php" class="text-center">New user? click here</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function myfunc() {
            var x = document.getElementById("password");
            var icon = document.getElementById("icon");
            if (x.type == "password") {
                x.type = "text";
                icon.classList.replace("bi-eye", "bi-eye-slash");
            }
            else {
                x.type = "password";
                icon.classList.replace("bi-eye-slash", "bi-eye"); // Change back to eye
            }


        }
        function select() {
            var x = document.getElementById("password");
            var x1 = document.getElementById("email");
            var x2 = document.getElementById("name");
            x.select();
            x1.select();
            x2.select();
        }

    </script>
    <?php
    if (isset($_POST['login'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Make sure $db is connected before running the query
        $query = "SELECT * FROM finalyr WHERE name='$name' AND email='$email' AND password='$password'";
        $res = mysqli_query($db, $query);

        if ($res && mysqli_num_rows($res) > 0) {
            echo "Login successful";
            $_SESSION["login_user"] = $name; // Store user name in session
            ?>
            <script type="text/javascript">
                window.location = 'student_preview.php';
            </script>
            <?php
        } else {
            echo "<p class='text-danger text-center'>Invalid login credentials</p>";
        }
    }
    ?>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>