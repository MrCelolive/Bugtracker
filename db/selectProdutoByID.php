<?php
include('conn.php');

$id = $_GET['id'];

$sql = "SELECT * FROM produto WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
        ?>
         <div class="col">
         <?php if($row['foto']!=null){
                ?><img src="img/produtos/<?=$row['foto']?>" class="w-100" alt="..."><?php
            }else{
                ?> <img src="img/product_error.jpg" class="w-100" alt="..."><?php
            }?>
        </div>
        <div class="col">
            <h2><?=$row['nome']?></h2>
            <p><?=$row['descricao']?></p>
            <p><?=$row['preco']?>€</p>
            <small><a href="index.php?pesquisa=<?=$row['tipoProduto']?>"><?=$row['tipoProduto']?></a></small><br>
            <?php if($row['quantidadeStock']>0){ ?>
                        <a href="#" class="btn btn-primary">Adicionar ao carrinho</a>
                    <?php }else{ ?>
                        <a class="btn btn-danger">Produto sem stock</a>
                    <?php } ?>
        </div>
        <?php
} else {
    header('Location: ../index.php?p=produtos');
}
$conn->close();
?>