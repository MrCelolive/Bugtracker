<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bugtracker";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  header('Location: ../index.php?p=404');
  exit();
}
?>
