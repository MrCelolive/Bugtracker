<form action="db/login.php" method="post">
    <div class="mb-3">
        <label for="form-username" class="form-label">Username</label>
        <input type="text" class="form-control" id="form-username" name="form-username" required>
    </div>
    <div class="mb-3">
        <label for="form-password" class="form-label">Password</label>
        <input type="password" class="form-control" id="form-password" name="form-password" required>
    </div>
    <div class="mb-3">
        <input class="btn btn-primary" type="submit" value="Entrar">
    </div>
</form>

<?php 
if(isset($_GET['res'])){
    if($_GET['res'] == "erro"){ 
        echo '<div class="alert alert-danger" role="alert">Erro de autenticação</div>';
    } else if($_GET['res'] == "invalido"){
        echo '<div class="alert alert-warning" role="alert">Preencha todos os campos</div>';
    } else if($_GET['res'] == "registook"){
        echo '<div class="alert alert-success" role="alert">Utilizador registado com sucesso</div>';
    } else if($_GET['res'] == "ban"){
        echo '<div class="alert alert-danger" role="alert">Utilizador banido até '.$_GET['data'].'.</div>';
    }
}
?>