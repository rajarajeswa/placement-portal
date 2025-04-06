<!DOCTYPE html>
<html lang="en">
<?php
include "connect.php";
session_start();

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        .large-font {
            font-size: 500%;
            font-weight: bold;
        }

        .quote {
            font-style: italic;
            font-size: 500%;
            color: #555;
        }

        /* Transition Effect */
        .hidden {
            opacity: 0;
            transform: scale(0.9);
            transition: opacity 0.4s ease-in-out, transform 0.4s ease-in-out;
            display: none;
        }

        .visible {
            opacity: 1;
            transform: scale(1);
            transition: opacity 0.4s ease-in-out, transform 0.4s ease-in-out;
            display: block;
        }

        #noMatchMsg {
            font-size: 1.2rem;
            color: red;
            font-weight: bold;
            text-align: center;
        }
    </style>
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
                            href="register.php">Register</a></li>
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
                            href="profile.php">Profile</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Search Box -->
    <h3 class="ms-2">Search</h3>
    <input type="text" onkeyup="myfunc()" id="searchinput" placeholder="Search for names..."
        class="form-control w-50 ms-2">

    <!-- Student Cards Section -->
    <div class="container mt-4">
        <div class="row" id="details">
            <?php
            $res = mysqli_query($db, "SELECT id, photo, fullname, regno FROM personal");
            if ($res && mysqli_num_rows($res) > 0):
                while ($row = mysqli_fetch_assoc($res)): ?>
                    <div class="col-md-4 mb-4 profile-card">
                        <div class="card text-center">
                            <div class="card-img pt-3">
                                <img src="<?php echo $row['photo']; ?>" alt="Profile Pic" class="img-fluid rounded-circle"
                                    width="100" height="100">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['fullname']; ?></h5>
                                <p class="card-text">Reg No: <?php echo $row['regno']; ?></p>
                                <a href="inside.php?id=<?php echo base64_encode($row['id']); ?>" class="btn btn-primary">
                                    Click to see profile
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endwhile;
            else:
                echo "<p class='text-center' id='noMatchMsg'>No records found.</p>";
            endif;
            ?>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        function myfunc() {
            let inp = document.getElementById("searchinput").value.toLowerCase();
            let items = document.querySelectorAll(".profile-card");
            let found = false;

            items.forEach(item => {
                let text = item.textContent.toLowerCase();
                if (text.includes(inp)) {
                    item.classList.remove("hidden");
                    item.classList.add("visible");
                    found = true;
                } else {
                    item.classList.remove("visible");
                    item.classList.add("hidden");
                }
            });

            // If no match is found, show a message
            let detailsDiv = document.getElementById("details");
            let noMatchMsg = document.getElementById("noMatchMsg");

            if (!found) {
                if (!noMatchMsg) {
                    noMatchMsg = document.createElement("p");
                    noMatchMsg.id = "noMatchMsg";
                    noMatchMsg.textContent = "No records found.";
                    noMatchMsg.classList.add("text-center", "mt-3");
                    detailsDiv.appendChild(noMatchMsg);
                }
            } else {
                if (noMatchMsg) {
                    noMatchMsg.remove();
                }
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>