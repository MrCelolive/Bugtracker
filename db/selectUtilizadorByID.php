<?php
include('conn.php');

$id = $_SESSION['id'];

$sql = "SELECT * FROM utilizador WHERE id=$id";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
} else {
    header('Location: ../index.php?p=404');
}
$conn->close();
?>