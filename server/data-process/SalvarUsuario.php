<?php
  require '../dao/UsuarioDAO.php';
  //require '../entitys/Usuario.php';
  $dados = json_decode(file_get_contents('php://input'));

  saveAccount($dados);

  function saveAccount($data){
    if (!isDataValid($data))
      return print('Dados invalidos!');
    $dao = new UsuarioDAO();
    if (!is_null($dao->findByEmail($data->email)))
      return print('<div class="alert alert-danger p-2">Essa conta já existe</div>');
    $usuario = new Usuario();
    $usuario->setNome($data->nome);
    $usuario->setEmail($data->email);
    $usuario->setDataNascimento($data->datanasc);
    $usuario->setSenha($data->senha);
    
    $dao->save($usuario);
    echo '<div class="alert alert-sucess p-2">Você se cadastrou com sucesso!</div>';
  }
  function isDataValid($data){
    $regex = [
      'nome' => "/^[a-zA-Z]{6,20}$/",
      'email' => "/^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+%40[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/",
      'senha' => "/^.{6,16}$/"
    ];
    if (preg_match($regex['nome'], $data->nome) && preg_match($regex['email'], $data->email) 
      && preg_match($regex['senha'], $data->senha))
      return true;
    return false;
  }
?>