<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
  <div class="container-fluid">
    <a class="navbar-brand text-white" href="#">Gerador Wareregy</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link text-white" href="gerar_produtos.php">Gerar Produtos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="gerar_registos.php">Gerar Registos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="consultar.php">Consultar</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="estatisticas.php">Estatísticas</a>
        </li>
      </ul>
      <span class="float-end mx-4 text-white">
      <?=$user;?>
    </span>
      <form class="float-end" name="" method="POST" action="index.php">
      <input type="submit" name="logout" class="btn btn-dark text-white" value="logout" >
    </form>
    </div>
  </div>
</nav>