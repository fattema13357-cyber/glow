<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "skincare_db";


$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("not connected " . $conn->connect_error);
}
?>