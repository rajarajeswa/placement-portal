<!DOCTYPE html>
<html lang="en">
<?php
include "connect.php";
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <title>Chat List</title>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
        }

        h3 {
            font-weight: bold;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
        }

        table {
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        th {
            background-color: #343a40;
            color: white;
        }

        .btn-mail {
            background-color: #343a40;
            color: white;
            transition: 0.3s;
        }

        .btn-mail:hover {
            background-color: #212529;
        }

        .back-btn {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h3 class="text-center">Chat List</h3>
        <?php
        $query = "SELECT * FROM personal";
        $res = mysqli_query($db, $query);

        if (mysqli_num_rows($res) > 0) {
            echo "<div class='table-responsive'>";
            echo "<table class='table table-bordered table-hover text-center'>";
            echo "<thead class='table-dark'>";
            echo "<tr>";
            echo "<th>S.no</th>";
            echo "<th>Name</th>";
            echo "<th>Department</th>";
            echo "<th>Contact</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";

            $sno = 1; // Serial number counter
            while ($row = mysqli_fetch_assoc($res)) {
                echo "<tr>";
                echo "<td>" . $sno++ . "</td>";
                echo "<td>" . htmlspecialchars($row['fullname']) . "</td>";
                echo "<td>" . htmlspecialchars($row['dept']) . "</td>";
                $email = $row['email'];
                echo "<td><a href='https://mail.google.com/mail/?view=cm&fs=1&to=$email' class='btn btn-mail'><i class='bi bi-envelope'></i> Mail me</a></td>";
                echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";
            echo "</div>";
        } else {
            echo "<p class='text-center text-muted'>No records found.</p>";
        }
        ?>
        <div class="back-btn">
            <a href="chat_outer.php" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Return Back</a>
        </div>
    </div>
</body>

</html>