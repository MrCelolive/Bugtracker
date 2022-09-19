<?php
include('conn.php');

$id_compra=$_GET['id_compra'];
$id_produto=$_GET['id_produto'];

$sql = "DELETE FROM compra_produto WHERE id_compra = $id_compra AND id_produto=$id_produto";

if ($conn->query($sql) === TRUE) {
    header('Location: ../index.php?p=carrinho&res=deleteok');
} else {
    header('Location: ../index.php?p=carrinho&res=erro');
}
$conn->close();
?>