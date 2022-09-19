<?php
if(isset($_GET['p'])){
    $p = $_GET['p'];

    if($p == "inicio")
        include('content/pages/inicio.php');
    else if($p == "produtos")
        include('content/pages/produtos.php');
    else if($p == "dprodutos")
        include('content/pages/detalhes-produto.php');
    else if($p == "contacto")
        include('content/pages/contacto.php');
    else if($p == "carrinho")
        include('content/pages/carrinho.php');
    /*else if($p == "pesquisa")
        include('content/pages/pesquisa.php');*/
    else if($p == "login" && !isset($_SESSION['username']))
        include('content/pages/login.php');
    else if($p == "registo" && !isset($_SESSION['username']))
        include('content/pages/registo.php');
    else if($p == "logout" && isset($_SESSION['username']))
        include('content/pages/logout.php');
    else if($p == "minha-conta" && isset($_SESSION['username']))
        include('content/pages/minha-conta.php');
    else if($p == "administracao" && isset($_SESSION['tipoUtilizador']) && $_SESSION['tipoUtilizador']=="administrador")
        include('content/pages/administracao.php');
    else
        include('content/pages/404.php');
}else if(isset($_GET['pesquisa'])){
    include('content/pages/pesquisa.php');
}else{
    include('content/pages/inicio.php');
}
?>