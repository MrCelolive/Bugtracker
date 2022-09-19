<?php
include('conn.php');

$id=$_GET['id'];

$sql = "DELETE FROM utilizador WHERE id = $id";

if ($conn->query($sql) === TRUE) {
        //Elimina imagem do utilizador eliminado
        $target = "../img/utilizadores/u$id.png";
        if (file_exists($target)) {
            unlink($target);
        }
        //--------------------------------------------
    header('Location: ../index.php?p=administracao&res=deleteok');
} else {
    header('Location: ../index.php?p=minha-conta&res=deleteerro');
}
$conn->close();
?>