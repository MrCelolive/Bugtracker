<?php
include('conn.php');

if(empty($_POST['form-nome']) || empty($_POST['form-descricao']) || empty($_POST['form-preco'])
|| empty($_POST['form-quantidadeStock'])|| empty($_POST['form-tipoProduto']))
{
    header('Location: ../index.php?p=administracao&res=novoprodutoerro');
    exit();
}

$nome=$_POST['form-nome'];
$descricao=$_POST['form-descricao'];
$preco=$_POST['form-preco'];
$quantidadeStock=$_POST['form-quantidadeStock'];
$tipoProduto=$_POST['form-tipoProduto'];
if(isset($_POST['form-visibilidade']))
    $visibilidade=1;
else
    $visibilidade=0;

$sql = "INSERT INTO produto (nome, descricao, preco, quantidadeStock, tipoProduto, visibilidade)
        VALUES('$nome','$descricao',$preco,$quantidadeStock,'$tipoProduto',$visibilidade)";

if ($conn->query($sql) === TRUE) {
    header('Location: ../index.php?p=administracao&res=novoprodutook');
} else {
    header('Location: ../index.php?p=administracao&res=novoprodutoerro');
}
$conn->close();
?>