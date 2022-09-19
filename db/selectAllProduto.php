<?php
include('conn.php');

$sql = "SELECT * FROM produto WHERE visibilidade = 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
        ?>
         <div class="col">
            <div class="card mx-auto" style="width: 18rem;">
            <?php if($row['foto']!=null){
                ?><a href="index.php?p=dprodutos&id=<?=$row['id']?>"><img src="img/produtos/<?=$row['foto']?>" class="card-img-top" alt="..."></a><?php
            }else{
                ?> <img src="img/product_error.jpg" class="card-img-top" alt="..."><?php
            }?>
                <div class="card-body">
                    <h5 class="card-title"><?= $row['nome']?></h5>
                    <p class="card-text"><?= $row['descricao']?></p>
                    <p class="card-text"><?= $row['preco']?>€</p>
                    <?php if($row['quantidadeStock']>0){ ?>
                        <a href="index.php?p=carrinho&id=<?=$row['id']?>" class="btn btn-primary">Adicionar ao carrinho</a>
                    <?php }else{ ?>
                        <a class="btn btn-danger">Produto sem stock</a>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php
    }
} else {
    //echo '<h1>Não há produtos a apresentar</h1>';
    ?><h1>Não há produtos a apresentar</h1><?php
}
$conn->close();
?>