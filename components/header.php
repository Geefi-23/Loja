<header id="header-top">
  <div id="container" class="d-flex flex-row h-100 p-0">
    <div id="start">
      <div id="container-optbtn">
        <button id="btn-menu-dropdown-toggle" class="dropdown h-100 text" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          OPCOES
        </button>
        <div id="menu-dropdown" class="dropdown-menu dropdown-menu-left rounded-0">
          <ul id="list" class="p-0">
            <li class="menu-option"><a href="index.php">Inicio</a></li>
            <li class="menu-option"><a>Mais vendidos</a></li>
            <li class="menu-option"><a>Categorias</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div id="center" class="d-flex align-items-center">
      <form id="search-box" class="d-inline-flex flex-row ai-center text" action="search.php" method="GET">
        <input id="input" class="ps-2" type="text" name="q" placeholder="Pesquisar">
        <button id="submit" class="font-0" type="submit" disabled>
          <div id="search-icon">
            <div class="head"></div>
            <div class="body"></div>
          </div>
          Pesquisar
        </button>
      </form>
    </div>
    <div id="end" class="d-flex justify-content-end align-items-center">
      <button id="btn-toggle-account-manager" class="d-flex flex-row rounded border bg-white p-1 text" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <div id="account-icon">
          <div class="head"></div>
          <div class="body"></div>
        </div>
        Minha conta
      </button>
      <div id="account-manager" class="dropdown-menu dropdown-menu-right rounded-0" aria-labelledby="btn-account-manager">
        <ul class="p-0">
        <?php if (isset($_SESSION['usuario'])): ?>
          <?php echo $USUARIO->getNome()?>
          <div class="dropdown-divider"></div>
          <li id="btn-mysolds" class="dropdown-item text-end p-0 pe-1 d-flex"><a>Minhas vendas</a></li>
          <li id="btn-cart" class="dropdown-item text-end p-0 pe-1 d-flex"><a href="carrinho-compras.php">Carrinho de compras</a></li>
          <li id="btn-wishlist" class="dropdown-item text-end p-0 pe-1 d-flex"><a href="lista-desejos.php">Lista de desejos</a></li>
          <li class="dropdown-item text-end p-0 pe-1 d-flex"><a href="logout.php">logout</a></li>
        <?php else: ?>
          <li class="dropdown-item text-end p-0 pe-1 d-flex"><a value="Fazer login" href="login.php">Entrar</a></li>
          <li class="dropdown-item text-end p-0 pe-1 d-flex"><a value="Fazer login" href="cadastro.php">Cadastrar-se</a></li>
        <?php endif;?>
        </ul>
      </div>
    </div>
  </div>
</header>