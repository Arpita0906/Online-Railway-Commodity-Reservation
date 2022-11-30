<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli("localhost","root","","rail commodity");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?> 