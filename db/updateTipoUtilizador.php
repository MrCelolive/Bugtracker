<?php
include('conn.php');

if(empty($_GET['id']) && empty($_GET['tipo']))
{
    header('Location: ../index.php?p=administracao&res=invalido');
    exit();
}
$id=$_GET['id'];
$tipo=$_GET['tipo'];

$sql = "UPDATE utilizador SET id_tipoUtilizador=$tipo WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header('Location: ../index.php?p=administracao&res=updateok');
} else {
    header('Location: ../index.php?p=administracao&res=erro');
}

$conn->close();
?>