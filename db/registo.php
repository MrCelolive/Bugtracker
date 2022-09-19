<?php
include('conn.php');

if(empty($_POST['form-username']) || empty($_POST['form-password']) || empty($_POST['form-password2']))
{
    header('Location: ../index.php?p=registo&res=invalido');
    exit();
}

$user=$_POST['form-username'];
$pass=$_POST['form-password'];
$pass2=$_POST['form-password2'];

if($pass!=$pass2){
    header('Location: ../index.php?p=registo&res=passwdn');
    exit();
}

session_start();

$sql = "INSERT INTO utilizador (username, password, id_tipoUtilizador) VALUES('$user','$pass',2)";

if ($conn->query($sql) === TRUE) {
    header('Location: ../index.php?p=login&res=registook');
} else {
    header('Location: ../index.php?p=registo&res=erro');
}
$conn->close();
?>