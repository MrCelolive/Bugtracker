<form action="db/registo.php" method="post">
    <div class="mb-3">
        <label for="form-username" class="form-label">Username</label>
        <input type="text" class="form-control" id="form-username" name="form-username" required>
    </div>
    <div class="mb-3">
        <label for="form-password" class="form-label">Password</label>
        <input type="password" class="form-control" id="form-password" name="form-password" required>
    </div>
    <div class="mb-3">
        <label for="form-password2" class="form-label">Confirme a Password</label>
        <input type="password" class="form-control" id="form-password2" name="form-password2" required>
    </div>
    <div class="mb-3">
        <input class="btn btn-primary" type="submit" value="Registar">
    </div>
</form>

<?php 
if(isset($_GET['res'])){
    if($_GET['res'] == "erro"){ 
        echo '<div class="alert alert-danger" role="alert">Erro de registo</div>';
    } else if($_GET['res'] == "invalido"){
        echo '<div class="alert alert-warning" role="alert">Preencha todos os campos</div>';
    } else if($_GET['res'] == "passwdn"){
        echo '<div class="alert alert-warning" role="alert">Passwords não correspondem</div>';
    }
}
?>