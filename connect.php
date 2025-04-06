<?php
$db = mysqli_connect("localhost", "root", "", "placement_db");

if (!$db) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
} 
?>