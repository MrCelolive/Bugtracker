<?php
include('conn.php');

session_start();
$id=$_SESSION['id'];

$sql = "DELETE FROM utilizador WHERE id = $id";
if ($conn->query($sql) === TRUE) {
    //Elimina imagem do utilizador eliminado
    $target = "../img/utilizadores/u$id.png";
    if (file_exists($target)) {
        unlink($target);
    }
    //--------------------------------------------
    header('Location: logout.php');
} else {
    header('Location: ../index.php?p=minha-conta&res=erro');
}
$conn->close();
?>