<?php
include('conn.php');

$id_utilizador = $_SESSION['id'];
$id_produto = $_GET['id'];

$sql = "INSERT INTO compra_produto VALUES((SELECT id FROM `compra` WHERE id_utilizador=$id_utilizador AND estado='Carrinho'),$id_produto,1,(SELECT preco FROM produto WHERE id = $id_produto));";
$conn->query($sql);

$conn->close();
?>