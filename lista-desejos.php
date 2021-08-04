<?php
  require 'server/entitys/Usuario.php';
  require 'server/dao/ProdutoDAO.php';
  session_start();
  $USUARIO;
  if (isset($_SESSION['usuario']))
    $USUARIO = unserialize($_SESSION['usuario']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles/pages/index.css">
  <link rel="stylesheet" href="styles/components/header.css">
  <link rel="stylesheet" href="styles/components/menu.css">
  <link rel="stylesheet" href="styles/components/notification.css">
  <link rel="stylesheet" href="styles/components/dialogs.css">
  <link rel="stylesheet" href="styles/icons/icons.css">
  <link href="styles/bootstrap-5/css/bootstrap.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <title>Loja</title>
</head>
<body>
  <div id="dialogs-container"></div>
  <?php require 'components/header.php'?>
  <section style="height: 100%">
    <div id="notifications-container"></div>
    <div id="main-container" class="container d-flex flex-row">
      <?php require 'components/menu.php'?>
      <div id="main-content" class="container px-5">
        <link rel="stylesheet" href="styles/products-list.css">
        <div class="d-flex justify-content-between">
          <button id="clear" class="text">Limpar a lista de desejos</button>
          <button id="remove" class="btn btn-danger text" disabled>Remover</button>
        </div>
        <div class="container text p-4" id="product-list">
          <div class="row">
            <div class="col col-sm-1"></div>
            <div class="col">Nome</div>
            <div class="col">Categoria</div>
            <div class="col">Preco</div>
            <div class="col col-sm-1"></div>
          </div>
        </div>
        <script type="module">
          import wishList from './js/lista-desejos.page.js'
          wishList.load()
        </script>
      </div>
    </div>
  </section>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>