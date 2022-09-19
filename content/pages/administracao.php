<div class="container">
    <div class="row text-center border-bottom py-2 bg-primary text-white">
        <div class="col">ID</div>
        <div class="col">USERNAME</div>
        <div class="col">TIPO UTILIZADOR</div>
        <div class="col">IMAGEM</div>
        <div class="col"></div>
        <div class="col"></div>
        <div class="col"></div>
    </div>
    <?php include('db/selectAllUtilizador.php')?>
</div>

<div class="container mt-5">
    <div class="row text-center border-bottom py-2 bg-primary text-white">
        <div class="col-1">ID</div>
        <div class="col-1">NOME</div>
        <div class="col-1">DESCRICAO</div>
        <div class="col-1">PREÇO</div>
        <div class="col-1">STOCK</div>
        <div class="col-1">TIPO</div>
        <div class="col">VISIBILIDADE</div>
        <div class="col">IMAGEM</div>
        <div class="col"></div>
        <div class="col">

            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Novo    
            </button>
            <!-- Modal -->
            <div class="modal fade text-dark text-start" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="db/AdicionarProduto.php" method="post">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Novo Produto</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="form-nome" class="form-label">Nome</label>
                                    <input type="text" class="form-control" id="form-nome" name="form-nome" required>
                                </div>
                                <div class="mb-3">
                                    <label for="form-descricao" class="form-label">Descrição</label>
                                    <input type="text" class="form-control" id="form-descricao" name="form-descricao" required>
                                </div>
                                <div class="mb-3">
                                    <label for="form-preco" class="form-label">Preço</label>
                                    <input type="number" class="form-control" id="form-preco" name="form-preco" required>
                                </div>
                                <div class="mb-3">
                                    <label for="form-quantidadeStock" class="form-label">Quantidade Stock</label>
                                    <input type="number" class="form-control" id="form-quantidadeStock" name="form-quantidadeStock" required>
                                </div>
                                <div class="mb-3">
                                    <label for="form-tipoProduto" class="form-label">Tipo de produto</label>
                                    <input type="text" class="form-control" id="form-tipoProduto" name="form-tipoProduto" required>
                                </div>
                                <div class="mb-3">
                                    <label for="form-visibilidade" class="form-label">Visibilidade</label>
                                    <input type="checkbox" id="form-visibilidade" name="form-visibilidade">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Adicionar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('db/selectAllProdutoAdmin.php')?>
</div>
<?php 
if(isset($_GET['res'])){
    if($_GET['res'] == "deleteerro"){ 
        echo '<div class="mt-2 alert alert-danger" role="alert">Erro ao eliminar utilizador</div>';
    } else if($_GET['res'] == "deleteok"){
        echo '<div class="mt-2 alert alert-success" role="alert">Utilizador eliminado com sucesso</div>';
    } else if($_GET['res'] == "recpasserro"){ 
        echo '<div class="mt-2 alert alert-danger" role="alert">Erro ao recuperar password</div>';
    } else if($_GET['res'] == "recpassok"){
        echo '<div class="mt-2 alert alert-success" role="alert">Nova password gerada</div>';
    } else if($_GET['res'] == "updateok"){
        echo '<div class="mt-2 alert alert-success" role="alert">Utilizador editado com sucesso</div>';
    } else if($_GET['res'] == "erroDataBan"){ 
        echo '<div class="mt-2 alert alert-danger" role="alert">Data de Ban inválida</div>';
    } else if($_GET['res'] == "deleteprodutoerro"){ 
        echo '<div class="mt-2 alert alert-danger" role="alert">Erro ao eliminar produto</div>';
    } else if($_GET['res'] == "deleteprodutook"){
        echo '<div class="mt-2 alert alert-success" role="alert">Produto eliminado com sucesso</div>';
    } else if($_GET['res'] == "produtoerro"){ 
        echo '<div class="mt-2 alert alert-danger" role="alert">Erro ao alterar o produto</div>';
    } else if($_GET['res'] == "updateprodutook"){
        echo '<div class="mt-2 alert alert-success" role="alert">Produto editado com sucesso</div>';
    } else if($_GET['res'] == "novoprodutoerro"){ 
        echo '<div class="mt-2 alert alert-danger" role="alert">Erro ao adicionar o produto</div>';
    } else if($_GET['res'] == "novoprodutook"){
        echo '<div class="mt-2 alert alert-success" role="alert">Produto adicionado com sucesso</div>';
    }
}
?>