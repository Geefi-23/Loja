<?php
  require 'server\dao\UsuarioDAO.php';
  $dao = new UsuarioDAO();
  foreach($dao->listAll() as $user){
    echo $user->getNome() . ' ' . $user->getEmail() . "\n";
  }
?>