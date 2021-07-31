<?php
  require 'server/entitys/Usuario.php';
  require 'server/dao/ProdutoDAO.php';
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
  <link rel="stylesheet" href="styles/pages/index.css">
  <link rel="stylesheet" href="styles/components/header.css">
  <link rel="stylesheet" href="styles/components/menu.css">
  <link rel="stylesheet" href="styles/components/notification.css">
  <link rel="stylesheet" href="styles/icons/icons.css">
  <link rel="stylesheet" href="styles/products-list.css">
  <link href="styles/bootstrap-5/css/bootstrap.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="js/index.js" type="module"></script>
  <title>Loja</title>
</head>
<body>
  <div id="conteiner-responses"></div>
  <?php require 'components/header.php'?>
  <section style="height: 100%">
    <div id="notifications-container"></div>
    <div id="main-container" class="container d-flex flex-row">
      <?php require 'components/menu.php'?>
      <div id="main-content" class="container px-5">
        <button id="clear" class="text" onclick="localStorage.removeItem('buyCart')">
          Limpar carrinho de compras
        </button>
        <table class="text" border="1" id="tabela-cart" class="list">
          <tr>
            <th>Nome</th>
            <th>Descricao</th>
            <th>Categoria</th>
            <th>Preco</th>
          </tr>
        </table>
        <script type="module">
          import notify from './js/modules/components/notifys.js'
          document.getElementById('clear').onclick = function(){
            localStorage.removeItem('buyCart')
            $('#tabela-cart').html('<tr>\
                                  <th>Nome</th>\
                                  <th>Descricao</th>\
                                  <th>Categoria</th>\
                                  <th>Preco</th>\
                                </tr>')
            notify.dispatch('Carrinho de compras apagado')
          }
          let carrinho = JSON.parse(localStorage.getItem('buyCart'))
          if (carrinho != null)
            carrinho.forEach(function(produto){
              $('#tabela-cart').html($('#tabela-cart').html() + `<tr>\
                                    <td>${produto.nome}</td>\
                                    <td>${produto.descricao}</td>\
                                    <td>${produto.categoria}</td>\
                                    <td>${produto.preco}</td>
                                  </tr>`)
            })
        </script>
      </div>
    </div>
  </section>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>