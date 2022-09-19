<?php
include('conn.php');

$id=$_GET['id'];

$sql = "DELETE FROM produto WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    header('Location: ../index.php?p=administracao&res=deleteprodutook');
} else {
    header('Location: ../index.php?p=minha-conta&res=deleteprodutoerro');
}
$conn->close();
?>