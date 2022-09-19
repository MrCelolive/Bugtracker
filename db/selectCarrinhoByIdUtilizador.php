<?php

include('conn.php');

$id = $_SESSION['id'];

$sql = "SELECT compra_produto.id_compra, compra_produto.id_produto, compra_produto.quantidade, compra_produto.preco_unit, produto.nome, produto.foto FROM compra_produto, produto WHERE id_compra = (SELECT id FROM compra WHERE id_utilizador=$id AND estado='Carrinho') AND compra_produto.id_produto = produto.id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){?>
        <div class="row border-bottom">
        <div class="col">
        <?php if($row['foto']!=null){
                ?><img src="img/produtos/<?=$row['foto']?>" class="w-100" alt="..."><?php
            }else{
                ?> <img src="img/product_error.jpg" class="w-100" alt="..."><?php
            }?>
        </div>
        <div class="col">
            <?=$row['nome']?>
        </div>
        <div class="col">
            <i class="fa-solid fa-trash-can" onclick="location.replace('db/deleteProdutoCarrinho.php?id_compra='+<?= $row['id_compra']?>+'&id_produto='+<?= $row['id_produto']?>)"></i>
        </div>
        <div class="col">
            <button class="btn btn-primary" onclick="somaCarrinho('carrinho-quantidade<?=$row['id_produto']?>','carrinho-preco<?=$row['id_produto']?>')">+</button>
            <input type="number" class="w-50" name="carrinho-quantidade<?=$row['id_produto']?>" id="carrinho-quantidade<?=$row['id_produto']?>" value="<?=$row['quantidade']?>">
            <button class="btn btn-primary" onclick="subtraiCarrinho('carrinho-quantidade<?=$row['id_produto']?>','carrinho-preco<?=$row['id_produto']?>')">-</button>
        </div>
        <div class="col">
            <input type="number" name="carrinho-preco<?=$row['id_produto']?>" id="carrinho-preco<?=$row['id_produto']?>" value="<?php echo $row['quantidade']*$row['preco_unit'] ?>" readonly>
        </div>
    </div>
   <?php }
} else {
    echo "<h4>Sem produtos para apresentar</h4>";
}
$conn->close();

?>
<div class="row">
    <div class="col-8"></div>
    <div class="col">Total carrinho</div>
</div>