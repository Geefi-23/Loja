<?php
  require '../dao/ProdutoDAO.php';
  require '../entitys/Produto.php';

  $dao = new ProdutoDAO();
    $produto = $dao->findById($_GET['id']);
  echo "{\"nome\":\"".$produto['nome']."\",\"descricao\":\"".$produto['descricao']."\",\"categoria\":\"".$produto['categoria']."\",\"preco\":\"".$produto['preco']."\"}"
?>