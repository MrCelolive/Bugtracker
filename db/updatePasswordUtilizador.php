<?php
include('conn.php');

$sql = "UPDATE utilizador SET password='$novaPass' WHERE id=$id";
$conn->query($sql);

$conn->close();
?>