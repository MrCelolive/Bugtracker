<h2>Carrinho de Compras</h2>
<?php
if (!empty($_GET['id'])){
    include('db/adicionarProdutoCarrinho.php');
}
     include('db/selectCarrinhoByIdUtilizador.php')?>

<?php
if (!empty($_GET['id'])){
    include('db/adicionarProdutoCarrinho.php');
    ?>
    <div class="alert alert-success" role="alert">
        Produto adicionado ao carrinho
    </div>
    <?php
   } if(isset($_GET['res'])){
        if($_GET['res'] == "erro"){ 
            echo '<div class="mt-2 alert alert-danger" role="alert">Erro ao eliminar produto</div>';
        } else if($_GET['res'] == "deleteok"){
            echo '<div class="mt-2 alert alert-success" role="alert">Produto removido com sucesso</div>';
        }
    }

?>