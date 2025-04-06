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
    <title>Document</title>
</head>
<th>

    <body>
        <?php
        //row is not aligned with heading :Your issue is caused by the incorrect use of <td> inside , which disrupts the table structure.
        

        $query = "SELECT * FROM personal";
        $res = mysqli_query($db, $query);

        if (mysqli_num_rows($res) > 0) {
            echo "<table border='1' class='table'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>S.no</th>";
            echo "<th>Name</th>";
            echo "<th>Contact</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";

            $sno = 1; // Serial number counter
            while ($row = mysqli_fetch_assoc($res)) {
                echo "<tr>";
                echo "<td class='ms-3'>" . $sno++ . "</td>";  // Increment serial number
                echo "<td class='ms-3'>" . htmlspecialchars($row['fullname']) . "</td>";
                $email = $row['email'];

                echo "<td><a href='https://mail.google.com/mail/?view=cm&fs=1&to=$email' class='btn btn-dark text-white'>Mail me</a>";
                echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";
        } else {
            echo "<p>No records found.</p>";
        }
        ?>

    </body>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

</html>