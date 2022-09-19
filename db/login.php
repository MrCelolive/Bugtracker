<?php
include('conn.php');

if(empty($_POST['form-username']) || empty($_POST['form-password']))
{
    header('Location: ../index.php?p=login&res=invalido');
    exit();
}

$user=$_POST['form-username'];
$pass=$_POST['form-password'];

session_start();

$sql = "SELECT utilizador.id,tipoutilizador.descricao, utilizador.dataHoraBan FROM utilizador, tipoutilizador WHERE username='$user' AND password='$pass' AND utilizador.id_tipoUtilizador=tipoutilizador.id";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();

    $ban = new DateTime($row['dataHoraBan']);

    if($ban=="null"){
        $_SESSION['id'] = $row['id'];
        $_SESSION['tipoUtilizador'] = $row['descricao'];
        $_SESSION['username'] = $user;
        header('Location: ../index.php?p=minha-conta');
    }else{
        $dataAtual = new DateTime('now');
        if($ban<$dataAtual){
            $_SESSION['id'] = $row['id'];
            $_SESSION['tipoUtilizador'] = $row['descricao'];
            $_SESSION['username'] = $user;
            $sql = "UPDATE utilizador SET dataHoraBan=null WHERE id=".$row['id'];
            $conn->query($sql);
            header('Location: ../index.php?p=minha-conta');
        }else{
            header('Location:../index.php?p=login&res=ban&data='.$ban->format('Y-m-d h:i:s'));
        }
    }
} else {
    header('Location: ../index.php?p=login&res=erro');

}
$conn->close();
?>