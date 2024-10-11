<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "event_website";

$conn = mysqli_connect("localhost", "root", "Madhu2412", "event_website",3307);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
