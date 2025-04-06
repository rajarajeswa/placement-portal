<!DOCTYPE html>
<html lang="en">
<?php
include "connect.php";
session_start();
if (!isset($_SESSION['login_user'])) {
    echo "<script>alert('You need to log in first!'); window.location.href='student_login.php';</script>";
    exit();
}

$username = $_SESSION['login_user'];

// Fetch user details
$res = mysqli_query($db, "SELECT * FROM personal WHERE fullname='$username'");
$user = mysqli_fetch_assoc($res);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f4f4;
        }

        .profile-card {
            max-width: 500px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .profile-img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #007bff;
        }

        .logout-btn {
            background: #dc3545;
            color: white;
            font-weight: bold;
        }

        .logout-btn:hover {
            background: #c82333;
        }
    </style>
</head>

<body>
    <div class="container mt-4">
        <h3 class="text-center mb-4">Account Profile</h3>

        <div class="profile-card">
            <img src="<?= htmlspecialchars($user['photo']); ?>" class="profile-img" alt="Profile Picture">



            <h4 class="mt-3"><?= htmlspecialchars($user['fullname']); ?></h4>
            <p class="text-muted"><?= htmlspecialchars($user['dept']); ?> Department</p>

            <div class="text-start">
                <p><strong>Register Number:</strong> <?= htmlspecialchars($user['regno']); ?></p>
                <p><strong>Email:</strong> <?= htmlspecialchars($user['email']); ?></p>
                <p><strong>Phone:</strong> <?= htmlspecialchars($user['mobileno']); ?></p>
            </div>


            <form method="post">
                <button type="submit" name="logout" class="btn  btn-outline-dark w-100 mt-2">Logout</button>
            </form>
        </div>
    </div>

    <?php
    if (isset($_POST['logout'])) {
        session_unset();
        session_destroy();
        echo "<script>window.location.href='student_login.php';</script>";
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>