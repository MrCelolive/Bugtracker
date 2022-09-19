<?php
include('conn.php');

$sql = "SELECT * FROM utilizador";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
        ?>
        <div class="row text-center border-bottom py-2">
        <div class="col"><?= $row['id']?></div>
        <div class="col"><?= $row['username']?></div>
        <div class="col">
        <?php 
            $idTU = $row['id_tipoUtilizador'];
            if($idTU==1) { 
                ?> <i class="fa-solid fa-user-gear" onclick="location.replace('db/updateTipoUtilizador.php?id='+<?= $row['id']?>+'&tipo=2')"></i><?php
            } else {
                ?> <i class="fa-solid fa-user" onclick="location.replace('db/updateTipoUtilizador.php?id='+<?= $row['id']?>+'&tipo=1')"></i><?php
            }
        ?>
        </div>
        <div class="col">
            <img class="w-50" src="img/utilizadores/<?= $row['foto']?>" alt="">
        </div>
        <div class="col">
            <?php if($row['dataHoraBan']==null) { ?>
            <i class="fa-solid fa-check text-success" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $row['id']?>"></i>
            <?php } else { ?>
            <i class="fa-solid fa-ban text-danger" onclick="location.replace('db/updateBanUtilizador.php?id='+<?= $row['id']?>+'&ban=0')"></i><br>
            <?= $row['dataHoraBan']?>
            <?php } ?>
        </div>
            <!-- Modal BAN -->
            <div class="modal fade text-dark text-start" id="exampleModal<?= $row['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="db/updateBanUtilizador.php" method="get">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ban Utilizador</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="text" class="form-control invisible" id="id" name="id" value="<?= $row['id']?>">
                                <div class="mb-3">
                                    <label for="ban" class="form-label">Data/Hora</label>
                                    <input type="datetime-local" class="form-control" id="ban" name="ban" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">OK</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <div class="col">
            <a href="db/resetPassword.php?id=<?= $row['id']?>&username=<?= $row['username']?>" class="btn btn-primary">RESET PASSWORD</a>
        </div>
        <div class="col">
            <a href="db/deleteUser.php?id=<?= $row['id']?>" class="btn btn-danger">ELIMINAR UTILIZADOR</a>
        </div>
    </div>
        <?php
    }
} else {
    header('Location: ../index.php?p=404');
}
$conn->close();
?>