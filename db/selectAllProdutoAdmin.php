<?php
include('conn.php');

$sql = "SELECT * FROM produto";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
        ?>
        <form action="db/updateProduto.php" method="post" enctype="multipart/form-data">
            <div class="row text-center border-bottom py-2">
                <div class="col-1"><input class="input-number" type="number" name="id" value="<?= $row['id']?>" readonly></div>
                <div class="col-1"><input class="input-text" name="nome" type="text" value="<?= $row['nome']?>"></div>
                <div class="col-1"><input class="input-text" name="descricao" type="text" value="<?= $row['descricao']?>"></div>
                <div class="col-1"><input class="input-number" name="preco" type="number" value="<?= $row['preco']?>"></div>
                <div class="col-1"><input class="input-number" name="quantidadeStock" type="number" value="<?= $row['quantidadeStock']?>"></div>
                <div class="col-1"><input class="input-text" name="tipoProduto" type="text" value="<?= $row['tipoProduto']?>"></div>
                <div class="col">
                    <?php 
                    $vis = $row['visibilidade'];
                    if($vis==1) { 
                        ?> <i class="fa-solid fa-eye text-success" onclick="location.replace('db/updateVisibilidadeProduto.php?id='+<?= $row['id']?>+'&vis=0')"></i><?php
                    } else {
                        ?> <i class="fa-solid fa-eye-slash text-danger" onclick="location.replace('db/updateVisibilidadeProduto.php?id='+<?= $row['id']?>+'&vis=1')"></i><?php
                    }
                    ?>
                </div>
                <div class="col">
                    <?php if($row['foto']!=null){ ?>
                        <img class="w-50" src="img/produtos/<?= $row['foto']?>" alt="">
                    <?php } else { ?>
                        <img class="w-50" src="img/product_error.jpg" alt="">
                    <?php } ?>
                    <input type="file" name="foto" id="foto">
                </div>
                <div class="col"><input type="submit" class="btn btn-primary" value="EDITAR"></div>
                <div class="col">
                    <a href="db/deleteProduto.php?id=<?= $row['id']?>" class="btn btn-danger">ELIMINAR</a>
                </div>
            </div>
        </form>
        <?php
    }
} else {
    header('Location: ../index.php?p=404');
}
$conn->close();
?>