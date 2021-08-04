<?php
  require 'server/dao/ProdutoDAO.php';
  require 'server/entitys/Usuario.php';

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
  <link rel="stylesheet" href="styles/icons/icons.css">
  <link rel="stylesheet" href="styles/components/header.css">
  <link rel="stylesheet" href="styles/components/notification.css">
  <link rel="stylesheet" href="styles/components/main.css">
  <link rel="stylesheet" href="styles/components/menu.css">
  <link href="styles/bootstrap-5/css/bootstrap.css" rel="stylesheet">
  <title>Loja</title>
</head>
<body>
  <?php require 'components/header.php'?>
  <section style="height: 100%">
    <div id="notifications-container"></div>
    <div id="main-container" class="container d-flex flex-row">
      <?php require 'components/menu.php'?>
      <div id="main-content" class="container px-5">
        <div id="produto-view" class="d-flex flex-column">
          <link rel="stylesheet" href="styles/pages/produto.css">
        <?php 
          $dao = new ProdutoDAO();
          $produto = $dao->findById($_GET['id']);
          echo var_dump($_GET);
          $GLOBALS['usuarios'] = 0;
        ?>
          <div id="imagem"></div>
          <h3><?php echo $produto['nome'] ?></h3>
          <span id="descricao" class="text"><?php echo $produto['descricao'] ?></span>
          <span id="preco" class="text"><?php echo $produto['preco'] ?></span>
          <div id="container-manager-qtd" class="text">
            <button id="back" class="rounded-btn"><</button>
            <span id="container-qtd">1</span>
            <button id="forward" class="rounded-btn">></button>
          </div>
          <div>
            <?php if (isset($_SESSION['usuario'])): ?>
            <button class="btn-buy btn btn-primary">Comprar</button>
            <button class="btn-wishlist btn btn-primary">Adicionar à lista de desejos</button>
            <?php else: ?>
            <div class="alert alert-danger p-1 text">Você deve estar logado para realizar uma compra!</div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script type="module">
    import view from './js/modules/components/product-view.configs.js';
    $(document).ready(function(){
      console.log('carrgou')
      view.init();
    })
  </script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>