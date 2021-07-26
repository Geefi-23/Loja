<?php
  require '../dao/UsuarioDAO.php';
  $dados = json_decode(file_get_contents('php://input'));
  
  $usuario = getAccount($dados);
  if (is_null($usuario))
    return print('<div class="alert alert-danger p-2">Essa conta não existe</div>');
  session_start();
  $_SESSION['usuario'] = serialize($usuario);
  echo 'index';

  function getAccount($data){
    if (!isDataValid($data))
      return null;
    $user = new Usuario();
    $dao = new UsuarioDAO();
    $user->setEmail($data->email);
    $user->setSenha($data->senha);
    try{
      $usuario = $dao->findByAuthCred($user);
    }catch (Exception $e){
      echo "Exceção lançada: {$e->getMessage()}";
    }
    return $usuario;
  }
  function isDataValid($data){
    $regex = [
      'email' => "/^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/",
      'senha' => "/^.{6,16}$/"
    ];
    if (preg_match($regex['email'], $data->email) && preg_match($regex['senha'], $data->senha))
      return true;
    return false;
  }
?>