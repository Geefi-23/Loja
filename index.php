<?php
  require 'server/entitys/Usuario.php';
  require 'server/entitys/Produto.php';
  session_start();
  $USUARIO;
  if (isset($_SESSION['usuario']))
    $USUARIO = unserialize($_SESSION['usuario']);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles/index.css">
  <!--<link rel="stylesheet" href="styles/index.acc-manager.css">
  <link rel="stylesheet" href="styles/index.top-header.css">-->
  <link rel="stylesheet" href="styles/index.icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
  rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="js/index.js" type="module"></script>
  <title>Loja</title>
</head>
<body>
  <div id="conteiner" class="ajax-forms hidden">

  </div>
  <header id="header-top">
    <div class="container d-flex flex-row h-100 p-0">
      <div id="center">
        <form id="search-box" class="d-inline-flex flex-row ai-center" action="search.php" method="GET">
            <input id="input" type="text" name="q" placeholder="Pesquisar">
            <button id="submit" type="submit" disabled>
              <div id="search-icon">
                <div class="head"></div>
                <div class="body"></div>
              </div>
            </button>
          </form>
      </div>
      <div id="end" class="d-flex justify-content-end">
        <button id="btn-account-manager" class="d-flex flex-row rounded border bg-white p-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <div id="account-icon">
            <div class="head"></div>
            <div class="body"></div>
          </div>
          <span>
            Minha conta
          </span>
        </button>
        <div class="dropdown-menu dropdown-menu-right rounded-0" aria-labelledby="btn-account-manager">
        <?php if (isset($_SESSION['usuario'])): ?>
          <ul>
            <li class="dropdown-item"><?php echo $USUARIO->getNome()?></li>
            <div class="dropdown-divider"></div>
            <li class="dropdown-item"><a>Minhas vendas</a></li>
            <li class="dropdown-item"><a href="#">Carrinho de compras</a></li>
            <li class="dropdown-item"><a href="logout.php">logout</a></li>
          </ul>
        <?php else:?>
          <ul>
            <li class="dropdown-item"><a value="Fazer login" href="login.php">Entrar</a></li>
            <li class="dropdown-item"><a value="Fazer login" href="cadastro.php">Cadastrar-se</a></li>
          </ul>
        <?php endif;?>
        </div>
      </div>
    </div>
  </header>
  <section class="conteiner-fluid">
    <div id="menu">
      <nav class="nav-links">
        <ul>
          <li class="menu-option"><a href="index.php">Inicio</a></li>
          <li class="menu-option more-sold"><a href="">Mais vendidos</a></li>
          <li class="menu-option categories"><a href="">Categorias</a></li>
        </ul>
      </nav>
    </div>
    <div id="conteiner" class="main-content">
      <div id="produto" class="preview main">
        <div id="produto" class="preview info-conteiner">
          <h3 id="produto" class="preview title">
            eae
          </h3>
          <span id="produto" class="preview desc">
            eae
          </span>
          <span id="produto" class="preview preco">
            R$15,00
          </span>
          <?php if (isset($_SESSION['usuario'])): ?>
            <div>
              <span id="GAMBIARRA" style="display: none">
                {<?php 
                $nome = 'eae mn';
                $descricao = 'blz??';
                $preco = '3 conto';

                echo "\"nome\":\"$nome\",\"descricao\":\"$descricao\",\"preco\":\"$preco\""?>}
              </span>
              <button id="produto" class="botao comprar">Comprar</button>
              <button id="produto" class="botao cart">
                Adicionar ao carrinho
              </button>
            </div>
          <?php else: ?>
            Você deve estar logado para fazer uma compra!
          <?php endif; ?>
        </div>
        <div id="produto" class="preview image-conteiner"></div>
      </div>
    </div>
  </section>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>