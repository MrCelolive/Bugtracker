<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php?p=inicio">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?p=produtos">Produtos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?p=contacto">Contactos</a>
        </li>
        <?php if(!isset($_SESSION['username'])){ ?>
        <li class="nav-item">
          <a class="nav-link" href="index.php?p=login">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?p=registo">Registo</a>
        </li>
        <?php } else { ?>
        <li class="nav-item">
          <a class="nav-link" href="index.php?p=minha-conta">Minha Conta</a>
        </li>
        <?php if(($_SESSION['tipoUtilizador']) == "administrador") { ?>
        <li class="nav-item">
          <a class="nav-link" href="index.php?p=administracao">Administração</a>
        </li>
        <?php } ?>
        <li class="nav-item">
          <a class="nav-link" href="db/logout.php">Logout</a>
        </li>
        <?php } ?>
      </ul>
      <i class="fa-solid fa-circle-half-stroke mx-5" onclick="darkmode()"></i>
      <a href="index.php?p=carrinho"><i class="fa-solid fa-cart-shopping mx-5"></i></a>
      <form class="d-flex" action="index.php" method="get">
        <input name="pesquisa" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>