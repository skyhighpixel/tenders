<?php
$connect = mysqli_connect("localhost:3306", "root", "", "test");

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
