<?php
include('conn.php');

if(empty($_GET['id']) && empty($_GET['tipo']))
{
    header('Location: ../index.php?p=administracao&res=invalido');
    exit();
}
$id=$_GET['id'];
$vis=$_GET['vis'];

$sql = "UPDATE produto SET visibilidade=$vis WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header('Location: ../index.php?p=administracao&res=updateprodutook');
} else {
    header('Location: ../index.php?p=administracao&res=produtoerro');
}

$conn->close();
?>