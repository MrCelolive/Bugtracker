<?php
include('conn.php');

//------------------------------------------------------------------------------------
//ALTERNATIVA 1: VALIDA SE USERNAME E PASSWORD INSERIDOS
/*if(empty($_POST['form-username']) || empty($_POST['form-password']))
{
    header('Location: ../index.php?p=minha-conta&res=invalido');
    exit();
}
session_start();

$id=$_SESSION['id'];

$user=$_POST['form-username'];
$pass=$_POST['form-password'];


$sql = "UPDATE utilizador SET username='$user', password='$pass' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    $_SESSION['username'] = $user;
    header('Location: ../index.php?p=minha-conta&res=updateok');
} else {
    header('Location: ../index.php?p=minha-conta&res=erro');
}*/
//------------------------------------------------------------------------------------
//ALTERNATIVA 2: SE PASSWORD NÃO PREENCHIDA, ALTERA APENAS USERNAME
if(empty($_POST['form-username']) && empty($_POST['form-password']))
{
    header('Location: ../index.php?p=minha-conta&res=invalido');
    exit();
}
session_start();

$id=$_SESSION['id'];

$user=$_POST['form-username'];
$pass=$_POST['form-password'];
$img=$_FILES['form-imagem'];

if($user!="" && $pass!="")  //utilizador preencheu username e password
    $sql = "UPDATE utilizador SET username='$user', password='$pass' WHERE id=$id";
else if($user!="")          //utilizador preencheu apenas username
    $sql = "UPDATE utilizador SET username='$user' WHERE id=$id";
else                        //utilizador preencheu apenas password
    $sql = "UPDATE utilizador SET password='$pass' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    if($user!="")
        $_SESSION['username'] = $user;

    if($_FILES["form-imagem"]["tmp_name"]!=""){
        $sql="UPDATE utilizador SET foto='u$id.png' WHERE id=$id";
        if ($conn->query($sql) === TRUE) {
            include('uploadUtilizador.php');
        }
    }
    header('Location: ../index.php?p=minha-conta&res=updateok');
} else {
    header('Location: ../index.php?p=minha-conta&res=erro');
}

$conn->close();
?>