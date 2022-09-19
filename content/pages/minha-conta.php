Bem-vindo, <?= $_SESSION['username']?>

<hr>
<?php include('db/selectUtilizadorByID.php')?>
<div class="container">
    <form action="db/updateUtilizador.php" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="form-username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="form-username" name="form-username" value="<?= $row['username']?>">
                </div>
               
                <label for="form-password" class="form-label">Password</label>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" id="form-password" name="form-password" value="<?= $row['password']?>">
                    <span class="input-group-text"><i class="far fa-eye" id="togglePassword" style="cursor: pointer"></i></span>
                </div>
            </div>
            <div class="col text-center">
                <?php 
                if(!is_null($row['foto'])){
                    ?><img class="w-100" src="img/utilizadores/<?=$row['foto']?>" alt=""><?php
                }else{
                    ?><img class="w-100" src="img/profile_img.jpeg" alt=""><?php 
                } ?>
                <br>
                <input type="file" name="form-imagem" id="form-imagem">
            </div>
            <div class="row">
                <div class="col">
                    <input class="btn btn-primary" type="submit" value="Editar">
                    <a href="db/deleteUtilizador.php" class="btn btn-danger">Eliminar</a>
                </div>
            </div>
        </div>
    </form>
<?php 
if(isset($_GET['res'])){
    if($_GET['res'] == "erro"){ 
        echo '<div class="mt-2 alert alert-danger" role="alert">Erro de edição</div>';
    } else if($_GET['res'] == "invalido"){
        echo '<div class="mt-2 alert alert-warning" role="alert">Preencha pelo menos um dos campos</div>';
    } else if($_GET['res'] == "updateok"){
        echo '<div class="mt-2 alert alert-success" role="alert">Dados editados com sucesso</div>';
    }
}?>
</div>