<?php
include('conn.php');

if(empty($_GET['id']) && empty($_GET['ban']))
{
    header('Location: ../index.php?p=administracao&res=invalido');
    exit();
}
$id=$_GET['id'];
$ban=$_GET['ban'];
if($ban==0)
    $sql = "UPDATE utilizador SET dataHoraBan=null WHERE id=$id";
else{
    $ban1 = new DateTime($ban);
    $dataAtual = new DateTime('now');
        if($ban1>$dataAtual){
            $sql = "UPDATE utilizador SET dataHoraBan='$ban' WHERE id=$id";
        }else{
            header('Location: ../index.php?p=administracao&res=erroDataBan');
            exit();
        }
}
if ($conn->query($sql) === TRUE) {
    header('Location: ../index.php?p=administracao&res=updateok');
} else {
    header('Location: ../index.php?p=administracao&res=erro');
}

$conn->close();
?>