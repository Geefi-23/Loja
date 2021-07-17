<?php
  require '../dao/UsuarioDAO.php';
  //require '../entitys/Usuario.php';
  $dados = json_decode(file_get_contents('php://input'));
  $dao = new UsuarioDAO();
  $usuario = new Usuario();
  $usuario->setNome($dados->nome);
  $usuario->setEmail($dados->email);
  $usuario->setDataNascimento($dados->datanasc);
  $usuario->setSenha($dados->senha);
  $dao->save($usuario);
?>