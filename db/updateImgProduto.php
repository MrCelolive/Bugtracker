<?php
include('conn.php');

if(empty($_POST['id']) && empty($_FILES['foto']))
{
    header('Location: ../index.php?p=administracao&res=invalido');
    exit();
}

$id=$_POST['id'];
$img=$_FILES['foto'];

$sql = "UPDATE produto SET foto='p$id.png' WHERE id=$id";

if($_FILES["foto"]["tmp_name"]!=""){
    $sql="UPDATE produto SET foto='p$id.png' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        include('uploadProduto.php');
        header('Location: ../index.php?p=administracao&res=updateok');
    } else {
        header('Location: ../index.php?p=administracao&res=erro');
    }
}else{
    header('Location: ../index.php?p=administracao&res=erro');
}

$conn->close();
?>