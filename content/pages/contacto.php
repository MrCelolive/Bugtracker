<form action="email.php" method="post">
    <div class="mb-3">
        <label for="form-email" class="form-label">Email</label>
        <input type="email" class="form-control" id="form-email" name="form-email">
    </div>
    <div class="mb-3">
        <label for="form-mensagem" class="form-label">Mensagem</label>
        <textarea class="form-control" id="form-mensagem" name="form-mensagem" rows="3"></textarea>
    </div>
    <div class="mb-3">
        <input class="btn btn-primary" type="submit" value="Enviar">
    </div>
</form>

<?php 
if(isset($_GET['res'])){
    if($_GET['res'] == "ok"){
    ?>
        <div class="alert alert-success" role="alert">Obrigado pelo seu contacto!</div>
    <?php 
    } else if($_GET['res'] == "erro"){ 
        echo '<div class="alert alert-danger" role="alert">Erro ao enviar mensagem!</div>';
    } else if($_GET['res'] == "invalido"){
        echo '<div class="alert alert-warning" role="alert">Preencha todos os campos</div>';
    }
}
?>
