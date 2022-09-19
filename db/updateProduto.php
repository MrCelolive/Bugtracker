<?php
include('conn.php');

if(empty($_POST['id']) || empty($_POST['nome']) || empty($_POST['descricao']) || empty($_POST['preco'])
    || empty($_POST['tipoProduto']))
{
    header('Location: ../index.php?p=administracao&res=produtoerro');
    exit();
}
$id=$_POST['id'];
$nome=$_POST['nome'];
$descricao=$_POST['descricao'];
$preco=$_POST['preco'];
$quantidadeStock=$_POST['quantidadeStock'];
$tipoProduto=$_POST['tipoProduto'];
$foto=$_FILES['foto'];

if($_FILES["foto"]["tmp_name"]!=""){
    $sql = "UPDATE produto SET nome='$nome', descricao='$descricao', preco=$preco, 
    quantidadeStock=$quantidadeStock, tipoProduto='$tipoProduto', foto='p$id.png' WHERE id=$id";

    include('uploadProduto.php');
}else{
    $sql = "UPDATE produto SET nome='$nome', descricao='$descricao', preco=$preco, 
    quantidadeStock=$quantidadeStock, tipoProduto='$tipoProduto' WHERE id=$id";
}

if($quantidadeStock==0){
    include('produtoSemStock.php');
}

if ($conn->query($sql) === TRUE) {
    header('Location: ../index.php?p=administracao&res=updateprodutook');
} else {
    header('Location: ../index.php?p=administracao&res=produtoerro');
}

$conn->close();
?>